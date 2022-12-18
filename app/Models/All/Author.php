<?php

namespace App\Models\All;

use App\Models\admin\MshlokDetail;
use App\Models\User;
use App\Models\blog\Post;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;
 /**
     * @var string
     */
    protected $table = 'authors';

    protected $fillable = [
        'name',
        'slug',
        'email',
        'is_visible',
        //'image',
        'bio',
        'phone',
        'facebook',
        'twitter',
        'youtube',
        'created_by'
    ];

    // protected $appends = [
    //     'image',
    // ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class );
    }

        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function mshlokdetail(): HasMany
    {
        return $this->hasMany(MshlokDetail::class );
    }

    public function shanka(): HasMany
    {
        return $this->hasMany(Shankaque::class );
    }


}

