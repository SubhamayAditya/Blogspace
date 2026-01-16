<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::where('role','user')->get();
        return view('admin.users', compact('users'));
    }

    public function approve($id) {
        $user = User::find($id);
        $user->is_approved = true;
        $user->save();

        return back()->with('success','User Approved');
    }
}
