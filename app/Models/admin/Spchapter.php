<?php

namespace App\Models\admin;

use App\Models\User;
use DateTimeInterface;
use App\Models\All\Author;
use App\Models\admin\Spbook;
use App\Models\All\Language;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spchapter extends Model implements Viewable
{
    use HasFactory,  SoftDeletes, HasSEO, InteractsWithViews;

     protected $table = 'spchapters';

    protected $fillable = [
        'chapter_no',
        'title',
        'is_visible',
        'slug',
        'content',
        'spbook_id',
        'author_id',
        'language_id',
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

    public function spbook(): BelongsTo
    {
        return $this->belongsTo(Spbook::class, 'spbook_id')->where('is_visible', '1');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function translator(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'translator_id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id')->where('is_visible', '1');
    }

        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

}
