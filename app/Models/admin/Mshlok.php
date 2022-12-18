<?php

namespace App\Models\admin;

use App\Models\All\Language;
use App\Models\admin\Mchapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mshlok extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mshloks';

    protected $fillable = [
        'title',
        'mshlok_no',
        'is_visible',
        'mchapter_id',
        'created_by'      
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
        'is_visible' => 'boolean',
    ];

    public function mchapter(): BelongsTo
    {
        return $this->belongsTo(Mchapter::class, 'mchapter_id')->where('is_visible', '1');
    }

    // public function language(): BelongsTo
    // {
    //     return $this->belongsTo(Language::class, 'language_id')->where('is_visible', '1');
    // }
    public function mshlokdetail(): HasMany
    {
        return $this->hasMany(MshlokDetail::class,'mshlok_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
