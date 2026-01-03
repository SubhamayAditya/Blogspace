<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogReaction extends Model
{
    protected $table = 'blog_reactions';

    protected $fillable = [
        'blog_id',
        'user_id',
        'type', // like | dislike
    ];

    /**
     * Reaction belongs to a blog
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * Reaction belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
