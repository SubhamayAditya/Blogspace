<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogReactionController extends Controller
{
    /**
     * Handle like/dislike reaction
     */
    public function like($id)
    {

        if (!Auth::check()) {
            return response()->json([
                'message' => 'You must log in first'
            ], 401);
        }

        $userId = auth()->id();
        $blog = Blog::findOrFail($id);

        // Find existing reaction
        $reaction = BlogReaction::firstOrCreate(
            ['blog_id' => $id, 'user_id' => $userId],
            ['type' => 'like']
        );

        // Switch if previously disliked
        if ($reaction->wasRecentlyCreated === false && $reaction->type !== 'like') {
            $reaction->update(['type' => 'like']);
        }

        return response()->json([
            'likes' => $blog->likes()->count(),
            'dislikes' => $blog->dislikes()->count(),
            'userReaction' => 'like'
        ]);
    }

    public function dislike($id)
    {

        if (!Auth::check()) {
            return response()->json([
                'message' => 'You must log in first'
            ], 401);
        }

        $userId = auth()->id();
        $blog = Blog::findOrFail($id);

        $reaction = BlogReaction::firstOrCreate(
            ['blog_id' => $id, 'user_id' => $userId],
            ['type' => 'dislike']
        );

        if ($reaction->wasRecentlyCreated === false && $reaction->type !== 'dislike') {
            $reaction->update(['type' => 'dislike']);
        }

        return response()->json([
            'likes' => $blog->likes()->count(),
            'dislikes' => $blog->dislikes()->count(),
            'userReaction' => 'dislike'
        ]);
    }
}
