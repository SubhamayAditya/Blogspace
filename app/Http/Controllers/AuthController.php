<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;
use App\Models\Message;
use App\Http\Controllers\CommentController;
// use Dom\Comment;
use App\Models\Comment;

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

        $blogs = Blog::where('user_id', auth()->id())->latest()->paginate(5); // only admins's own blogs

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


            'adminBlogsViews' => Blog::where('user_id', auth()->id())->sum('views'),


            // total comments on admin's blogs
            'BlogsComments'    => Comment::whereIn(
                'blog_id',
                Blog::where('user_id', auth()->id())->pluck('id')
            )->count(),

            // Total Mails
            'AllMails'         => Message::count(),
        ]);
    }




    // Contact form message
    public function saveMessage(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Message::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }


    // MAilbox page
    public function mailbox()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $messages = Message::latest()->paginate(5);

        return view('admin.mailbox', compact('messages'));
    }

    //show blog from Admin dashboard

    public function showAdmBlog($id)
    {
        $blog = Blog::where('id', $id)
            ->where('user_id', auth()->id()) // user can view only their own blog
            ->firstOrFail();

        return view('admin.showadminblog', compact('blog'));
    }


    // ------------------------------------------------------------User Role ------------------------------------------------------------//

    // users blogs
    public function userblogs()
    {
        if (auth()->user()->role !== 'user') {
            abort(403, 'Unauthorized');
        }

        $blogs = Blog::where('user_id', auth()->id())->latest()->paginate(5); // only user's own blogs

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

            'userBlogsViews' => Blog::where('user_id', auth()->id())->sum('views'),

            // total comments on users's blogs
            'BlogsComments'    => Comment::whereIn(
                'blog_id',
                Blog::where('user_id', auth()->id())->pluck('id')
            )->count(),
        ]);
    }

    //show blog from user dashboard
    public function showBlog($id)
    {
        $blog = Blog::where('id', $id)
            ->where('user_id', auth()->id()) // user can view only their own blog
            ->firstOrFail();

        return view('user.showuserblog', compact('blog'));
    }

     //Edit blog from user dashboard
    public function EditUsrBlog($id)
    {
        $blog = Blog::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('user.edituserblog', compact('blog'));
    }
}
