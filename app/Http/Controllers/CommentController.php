<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $blogId)
    {
        $request->validate([
            'comment' => 'required|min:3'
        ]);

        Comment::create([
            'blog_id' => $blogId,
            'user_id' => Auth::id(),
            'name'    => Auth::check() ? Auth::user()->name : $request->name,
            'email'   => Auth::check() ? Auth::user()->email : $request->email,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function reply(Request $request, $commentId)
    {
        $request->validate([
            'comment' => 'required|min:2'
        ]);

        $parent = Comment::findOrFail($commentId);

        Comment::create([
            'blog_id'  => $parent->blog_id,
            'parent_id'=> $commentId,
            'user_id'  => Auth::id(),
            'name'     => Auth::check() ? Auth::user()->name : $request->name,
            'email'    => Auth::check() ? Auth::user()->email : $request->email,
            'comment'  => $request->comment
        ]);

        return back()->with('success', 'Reply added!');
    }
}
