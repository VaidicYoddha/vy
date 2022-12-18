<?php

namespace App\Models\admin;

use App\Models\User;
use DateTimeInterface;
use App\Models\All\Author;
use App\Models\admin\Mshlok;
use App\Models\All\Language;
use App\Models\admin\Mchapter;
use App\Models\admin\MchapterName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MshlokDetail extends Model implements Viewable
{
    use HasFactory, SoftDeletes, InteractsWithViews;

    protected $table = 'mshlok_details';

    protected $fillable = [
        'title',
        'details',
        'mshlok_no',
        'is_visible',
        'language_id',
        'mchapter_id',
        'mshlok_id',
        'chapter_name_id',
        'author_id',
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

    public function mshlok(): BelongsTo
    {
        return $this->belongsTo(Mshlok::class, 'mshlok_id')->where('is_visible', '1');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id')->where('is_visible', '1');
    }

    public function chaptername(): BelongsTo
    {
        return $this->belongsTo(MchapterName::class, 'chapter_name_id')->where('is_visible', '1');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('y-m-d H:i:s');
    }
}
