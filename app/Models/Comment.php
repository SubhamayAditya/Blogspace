<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'blog_id', 'user_id', 'parent_id', 'name', 'email', 'comment'
    ];

     public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderBy('id', 'DESC');
    }
}
