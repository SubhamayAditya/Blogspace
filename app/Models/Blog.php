<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'category',
        'user_id',
        'views'
    ];

    /**
     * Blog author
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Blog comments (only parent comments)
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)
                    ->whereNull('parent_id')
                    ->orderBy('id', 'DESC');
    }

    /**
     * Increment views safely
     */
    public function incrementViews()
    {
        $this->increment('views');
    }


     /**
     * Reactions relation
     */
    public function reactions()
    {
        return $this->hasMany(BlogReaction::class);
    }

    /**
     * Likes relation (type = like)
     */
    public function likes()
    {
        return $this->reactions()->where('type', 'like');
    }

    /**
     * Dislikes relation (type = dislike)
     */
    public function dislikes()
    {
        return $this->reactions()->where('type', 'dislike');
    }


    
}
