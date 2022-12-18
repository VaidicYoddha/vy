<?php

namespace App\Models\blog;

use App\Models\User;
use App\Models\blog\Post;
use App\Models\blog\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'message',
        'is_visible',
        'published_at',
        'post_id',
        'user_id'
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];


    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function approve()
    {
        return $this->belongsTo(Comment::class, 'is_visible');
    }

}

