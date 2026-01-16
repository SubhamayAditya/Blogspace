<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BlogReactionController;
use Illuminate\Support\Facades\Password;

// Route::get('/', function () {
//     return view('index');
// });

// index
Route::get('/', [BlogController::class, 'index'])->name('blog.index');

// write
Route::get('/write', [BlogController::class, 'write'])->name('blog.write');

// Store
Route::post('/store', [BlogController::class, 'store'])->name('blog.store');

// show
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.details');

// About
Route::get('/about', [BlogController::class, 'about'])->name('blog.about');

// Category
Route::get('/category', [BlogController::class, 'category'])->name('blog.category');

// Blogs
Route::get('/blogs', [BlogController::class, 'blogs'])->name('blog.blogs');

// contact
Route::get('/contact', [BlogController::class, 'contact'])->name('blog.contact');

// Privacy policy
Route::get('/privacypolicy', [BlogController::class, 'privacyPolicy'])->name('privacyPolicy');

// T&C
Route::get('/termscondition', [BlogController::class, 'tc'])->name('termsandcondition');

// Search
Route::get('/blogs/search', [BlogController::class, 'search'])->name('blog.search');

// Sidebar Category Search
Route::get('/category-search', [BlogController::class, 'catSearch'])->name('category.search');

// Register Page
Route::get('/register', [AuthController::class, 'registerPage'])->name('register.form');

// Register Submit
Route::post('/register', [AuthController::class, 'register'])->name('register');


// login page
Route::get('/login', [AuthController::class, 'loginPage']);

// Login
Route::post('/login', [AuthController::class, 'login'])->name('login');

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


///-------------------- Like & Dislike--------------------///

Route::post('/blog/{id}/like', [BlogReactionController::class, 'like'])
     ->name('blog.like')->middleware('auth');

Route::post('/blog/{id}/dislike', [BlogReactionController::class, 'dislike'])
     ->name('blog.dislike')->middleware('auth');


// ------------------------------------------------------------Admin Role ------------------------------------------------------------//

// Admin Dashboard
Route::get('/admin/admindashboard', function () {
    return view('admin.admindashboard');
})->middleware('auth');

// Admin Users management
Route::get('/admin/userslist', function () {
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized');
    }
    $users = User::all();
    return view('admin.userslist', compact('users'));
})->middleware('auth');


// Status update

Route::post('/admin/user/status/{id}', [AuthController::class, 'status'])
    ->middleware('auth')
    ->name('admin.user.status');

// User Delete   
Route::delete('/admin/user/delete/{id}', [AuthController::class, 'destroyUser'])
    ->middleware('auth')
    ->name('admin.user.delete');



//  Admin blogs management
Route::get('/admin/adminblogs', [AuthController::class, 'adminblogs'])
    ->middleware('auth')
    ->name('admin.blogs');


//Admin dashboard

Route::get('/admin/admindashboard', [AuthController::class, 'adminDashboard'])
    ->middleware('auth');


//Contact Form message Store
Route::post('/contact/submit', [AuthController::class, 'saveMessage'])->name('contact.submit');

// Admin Mailbox page
Route::get('/admin/mailbox', [AuthController::class, 'mailbox'])->middleware('auth')->name('admin.mailbox');


// Show admin blog
Route::get('/admin/blog/{id}', [AuthController::class, 'showAdmBlog'])->name('admin.blog.show');

//Admin blog delete
Route::delete('/blog/{blog}', [BlogController::class, 'destroyAdmin'])
    ->middleware('auth')
    ->name('blog.delete');


// Edit Admin blog
Route::get('/admin/blog/{id}/edit', [AuthController::class, 'EditAdminBlog'])->name('admin.blog.edit');

// update Admin blog
// Route::put('/user/blog/{id}', [AuthController::class, 'UpdateUsrBlog'])->name('user.blog.update');


//------------------------------------------------------------ Users Role------------------------------------------------------------//
// User Dashboard
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth');


//  Users blogs management
Route::get('/user/userblogs', [AuthController::class, 'userBlogs'])
    ->middleware('auth')
    ->name('user.blogs');



//  Users profile
Route::get('/user/userprofile', function () {
    return view('user.userprofile');
})->middleware('auth')->name('user.profile');


//User dashboard
Route::get('/user/dashboard', [AuthController::class, 'UserDashboard'])
    ->middleware('auth');

// Edit user profile
Route::get('/edituser', [AuthController::class, 'edituser'])->name('user.edit');

// Update user profile
Route::put('/user/update', [AuthController::class, 'updateuser'])->name('user.update');


// Show user blog
Route::get('/user/blog/{id}', [AuthController::class, 'showBlog'])->name('user.blog.show');


// Edit user blog
Route::get('/user/blog/{id}/edit', [AuthController::class, 'EditUsrBlog'])->name('user.blog.edit');

// update user blog
Route::put('/user/blog/{id}', [AuthController::class, 'UpdateUsrBlog'])->name('user.blog.update');



// user blog delete
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])
    ->middleware('auth')
    ->name('blog.delete');



//------------------------------------------------------------Comment & replies------------------------------------------------------------//
Route::middleware('auth')->group(function () {
    
    Route::post('/blog/{id}/comment', [CommentController::class, 'store'])
    ->name('comment.store');
    
    Route::post('/comment/{id}/reply', [CommentController::class, 'reply'])
    ->name('comment.reply');
});
//------------------------------------------------------------Forget & reset password------------------------------------------------------------//

Route::get('forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('forgot-password', function (Illuminate\Http\Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('reset-password', function (Illuminate\Http\Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');