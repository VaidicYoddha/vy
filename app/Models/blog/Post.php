<?php

namespace App\Models\blog;

use Carbon\Carbon;
use App\Models\User;
use DateTimeInterface;
use App\Models\blog\Tag;
use App\Models\All\Author;
use Illuminate\Support\Str;
use App\Models\All\Language;
use App\Models\blog\Comment;
use App\Models\blog\Category;
use App\Traits\Multitenantable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model implements Viewable
{
    use HasFactory,  SoftDeletes, HasSEO, InteractsWithViews, Sluggable;


    /**
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'is_visible',
        'slug',
        'published_at',
        'ref',
        'content',
        //'image',
        'author_id',
        'category_id',
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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

     protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('y-m-d H:i:s');
    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id')->where('is_visible', '1');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }



    public function scopeFilter($query, $filters)
    {

        if ($month = @$filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = @$filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(id) post_count')
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(created_at) desc')
                    ->get()
                    ->toArray();
    }


        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereBelongsTo(auth()->user());
    }

    public static function createSlug($title, $model, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = self::getRelatedSlugs($slug, $model, $id);
        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 50; $i++) {
            $sufix = \substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 4);
            $newSlug = $slug . '-' . $sufix;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    public static function makeHindiSlug($string, $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }

        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }



    protected static function getRelatedSlugs($slug, $model, $id = 0)
    {
        return $model::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }

}
