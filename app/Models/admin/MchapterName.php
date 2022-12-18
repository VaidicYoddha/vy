<?php

namespace App\Models\admin;

use App\Models\User;
use App\Models\All\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MchapterName extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mchapter_names';

      protected $fillable = [
        'name',
        'chapter_no',
        'is_visible',
        'language_id',
        'created_by'      
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
        'is_visible' => 'boolean',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id')->where('is_visible', '1');
    }

        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

}
