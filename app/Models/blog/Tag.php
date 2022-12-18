<?php

namespace App\Models\blog;

use App\Models\User;
use DateTimeInterface;
use App\Models\blog\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

      protected $table = 'tags';

      protected $fillable = [

        'name',
        'slug',
        'created_by',

    ];

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('y-m-d H:i:s');
    // }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

