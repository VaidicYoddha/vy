<?php

namespace App\Models\admin;

use App\Models\User;
use DateTimeInterface;
use App\Models\All\Language;
use App\Models\admin\Arshchapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arshbook extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'arshbooks';

    protected $fillable = [

        'name',
        'slug',
        'is_visible',
        'details',
        'language_id',
        'created_by'
    ];
    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('y-m-d H:i:s');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id')->where('is_visible', '1');
    }

        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Arshchapter::class, 'arshbook_id');
    }
}

