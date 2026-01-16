<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;
use App\Models\Message;
use App\Models\BlogReaction;

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
                return redirect('/admin/admindashboard')->with('success', 'Admin Login successfully!');
                //  return redirect()->back()->with('success', 'Admin Login successfully!');
            } else {
                return redirect('/user/dashboard')->with('success', 'User Login successfully!');
                //  return redirect()->back()->with('success', 'User Login successfully!');
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

    //user Delete 
    public function destroyUser($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
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

            // Total Like dislike
            'AllReaction' => BlogReaction::count(),



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

    //Edit blog page from Admin dashboard
    public function EditAdminBlog($id)
    {
        $blog = Blog::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('admin.editadminblog', compact('blog'));
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

            // Total Like dislike
            // 'AllUserReaction' => BlogReaction::count(),

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

    //Edit blog page from user dashboard
    public function EditUsrBlog($id)
    {
        $blog = Blog::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('user.edituserblog', compact('blog'));
    }

    //Update user blog


    public function UpdateUsrBlog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'required',
        ]);

        // If new image uploaded
        if ($request->hasFile('image')) {

            // Delete old image
            if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
                unlink(public_path('uploads/' . $blog->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);

            $blog->image = $imageName;
        }

        $blog->title       = $request->title;
        $blog->description = $request->description;
        $blog->save();

        return redirect()->back()->with('success', 'Blog updated successfully!');
    }

    //Edit user profile
    public function edituser()
    {

        return view('user.edituserprofile');
    }

    //Update User Profile
    public function updateuser(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'bio' => 'nullable|string|max:500',
        ]);

        $data = $request->only('name', 'bio');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/users'), $imageName);
            $data['image'] = $imageName;
        }

        $user->update($data);

        return redirect()->route('user.edit')->with('success', 'Profile updated successfully!');
    }
}
