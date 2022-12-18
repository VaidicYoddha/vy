<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usefullinks extends Model
{
    use HasFactory;

    protected $table = 'usefullinks';

    protected $fillable = [
        'name',
        'web',
        'is_visible',
    ];

     /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
