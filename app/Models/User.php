<?php

namespace App\Models;

use App\Models\admin\MshlokDetail;
use App\Models\blog\Comment;
use App\Models\blog\Tag;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use JeffGreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;

class User extends Authenticatable implements BannableContract, FilamentUser, HasAvatar, MustVerifyEmail
{
    use HasApiTokens, HasRoles, SoftDeletes, HasFactory, Notifiable, Bannable;
    //TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role_id',
        'isban',
        'email',
        'password',
        'last_seen',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canAccessFilament(): bool
    {
        return $this->hasRole(['super_admin', 'admin']) && $this->hasVerifiedEmail();
        //return (Auth::user()->role_id == '1'  || Auth::user()->role_id == '2' );

      //str_ends_with($this->email, '@vy.in') && $this->hasVerifiedEmail();
        //return str_contains($this->role_as, '1', $this->role_as,'2');

    }

     public function isUserOnline()
    {
        return Cache::has('user-is-online' . $this->id);
    }

     public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function replies(){
        return $this->hasMany(Comment::class);
    }

        public function likedPosts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

     public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

     public function spchapters()
    {
        return $this->belongsToMany(Spchapter::class);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    public function author(): hasMany
    {
        return $this->hasMany(Author::class);
    }

     public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // public function roles(): HasMany
    // {
    //     return $this->HasMany(Role::class);
    // }
    public function mshlokdetail()
    {
        return $this->belongsToMany(MshlokDetail::class);
    }

}
