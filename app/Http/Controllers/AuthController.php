<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;

class AuthController extends Controller
{
    // registration page
    public function registerPage()
    {
        return view('auth.register');
    }

    // store new user
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'is_approved' => false
        ]);

        return redirect()->route('blog.index')->with('success', 'Registered! Wait for admin approval.');
        // return redirect()->route('blog.index')
        //     ->with('success', 'Blog created successfully!');
    }

    // login page
    public function loginPage()
    {
        return view('auth.login');
    }

    // login logic
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt login
        if (Auth::attempt($credentials)) {

            if (!Auth::user()->is_approved) {
                Auth::logout();
                return back()->with('error', 'Your account is not approved yet!');
            }

            // Redirect based on role
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/admindashboard');
            } else {
                return redirect('/user/dashboard');
            }
        }

        return back()->with('error', 'Invalid credentials!');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // ------------------------------------------------------------Admin Role ------------------------------------------------------------//

    // Status update
    public function status($id)
    {
        $user = User::findOrFail($id);

        // Prevent admin disabling himself
        if ($user->id == auth()->id()) {
            return back()->with('error', 'You cannot change your own status.');
        }

        // Toggle approval
        $user->is_approved = !$user->is_approved;
        $user->save();

        return back()->with('success', 'User status updated successfully!');
    }


    // admin blogs
    public function adminblogs()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $blogs = Blog::where('user_id', auth()->id())->get(); // only admins's own blogs

        return view('admin.adminblogs', compact('blogs'));
    }

    //Admin dashboard
    public function adminDashboard()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return view('admin.admindashboard', [
            'totalUsers'     => User::count(),
            'pendingUsers'   => User::where('is_approved', false)->count(),
            'totalBlogs'     => Blog::count(),
        ]);
    }
    // ------------------------------------------------------------User Role ------------------------------------------------------------//

    // users blogs
    public function userblogs()
    {
        if (auth()->user()->role !== 'user') {
            abort(403, 'Unauthorized');
        }

        $blogs = Blog::where('user_id', auth()->id())->get(); // only user's own blogs

        return view('user.userblogs', compact('blogs'));
    }


    // User dashboard
    public function UserDashboard()
    {
        if (auth()->user()->role !== 'user') {
            abort(403, 'Unauthorized');
        }

        return view('user.dashboard', [
            'userBlogs' => Blog::where('user_id', auth()->id())->count(),
        ]);
    }

    //user edit
    public function edituser(){
return view('user.edituser');
    }


    // user blogs delete
    // public function destroy($id)
    // {
    //     $blog = Blog::findOrFail($id);

    //     // User can delete only their own blog
    //     if ($blog->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
    //         abort(403, 'Unauthorized');
    //     }

    //     // Delete uploaded blog image
    //     if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
    //         unlink(public_path('uploads/' . $blog->image));
    //     }

    //     $blog->delete();

    //     return back()->with('success', 'Blog deleted successfully!');
    // }
}
