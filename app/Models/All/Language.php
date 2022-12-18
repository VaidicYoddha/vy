<?php

namespace App\Models\All;

use App\Models\blog\Post;
use App\Models\admin\Spbook;
use App\Models\admin\Arshbook;
use App\Models\admin\Spchapter;
use App\Models\admin\MchapterName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    protected $fillable = [
        'name',
        'is_visible',
        'slug',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'language_id');
    }

    public function spchapters(): HasMany
    {
        return $this->hasMany(Spchapter::class, 'language_id');
    }

    public function spbooks(): HasMany
    {
        return $this->hasMany(Spbook::class, 'language_id');
    }

    public function chaptername(): HasMany
    {
        return $this->hasMany(MchapterName::class, 'language_id');
    }

    public function arshbooks(): HasMany
    {
        return $this->hasMany(Arshbook::class, 'language_id');
    }


}


