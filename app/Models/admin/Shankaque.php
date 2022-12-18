<?php

namespace App\Models\admin;

use App\Models\User;
use App\Models\All\Author;
use App\Models\All\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shankaque extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'shankaques';

    protected $fillable = [

        'shanka',
        'is_visible',
        'samadhan',
        'author_id',
        'created_by',
        'sub_id',
        'language_id',

    ];
        /**
     * @var array<string, string>
     */
    protected $casts = [
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

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Shankasub::class, 'sub_id')->where('is_visible', '1');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

}
