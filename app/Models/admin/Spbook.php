<?php

namespace App\Models\admin;

use App\Models\User;
use DateTimeInterface;
use App\Models\All\Language;
use App\Models\admin\Spchapter;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spbook extends Model
{
     use HasFactory,  SoftDeletes, HasSEO;

     protected $table = 'spbooks';

    protected $fillable = [
   
        'title',
        'is_visible',
        'slug',
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

    public function spchapters(): HasMany
    {
        return $this->hasMany(Spchapter::class, 'spbook_id');
    }

 
}
