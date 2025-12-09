<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use App\Http\Controllers\AuthController;
use App\Models\User;

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

// contact
Route::get('/contact', [BlogController::class, 'contact'])->name('blog.contact');

// Search
Route::get('/blogs/search', [BlogController::class, 'search'])->name('blog.search');

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


//  Admin blogs management
Route::get('/admin/adminblogs', [AuthController::class, 'adminblogs'])
    ->middleware('auth')
    ->name('admin.blogs');


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

// user blog delete

// Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])
//     ->middleware('auth')
//     ->name('blog.delete');
