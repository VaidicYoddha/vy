<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shankasub extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'shankasubs';

    protected $fillable = [

        'subject',
        'is_visible',
        'details',
        'created_by',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function shanka(): HasMany
    {
        return $this->hasMany(Shankaque::class, 'sub_id');
    }

}
