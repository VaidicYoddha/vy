<?php

namespace App\Models\admin;

use App\Models\User;
use DateTimeInterface;
use App\Models\All\Author;
use App\Models\All\Language;
use App\Models\admin\Arshbook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arshchapter extends Model implements Viewable
{
    use HasFactory, SoftDeletes, InteractsWithViews;

    protected $table = 'arshchapters';

    protected $fillable = [

        'chapter_no',
        'title',
        'slug',
        'content',
        'is_visible',
        'language_id',
        'arshbook_id',
        'author_id',
        'published_at',
        'created_by'
    ];
        /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
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

    public function arshbooks(): BelongsTo
    {
        return $this->belongsTo(Arshbook::class, 'arshbook_id')->where('is_visible', '1');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }


}
