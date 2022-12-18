<?php

namespace App\Models\admin;

use App\Models\User;
use DateTimeInterface;
use App\Models\admin\Mshlok;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mchapter extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'mchapters';

     /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
        'is_visible' => 'boolean',
    ];

    protected $fillable = [

        'name',
        'is_visible',
        'details',
        'mchapter_no',
        'created_by',

    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('y-m-d H:i:s');
    }

    public function mshlok(): HasMany
    {
        return $this->hasMany(Mshlok::class,'mchapter_id');
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by', 'id');
    }

 
}

