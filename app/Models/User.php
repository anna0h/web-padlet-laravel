<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'image'
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

    /**
     * user belongs to a padlets
     */
    public function padlets(): belongsTo{
        return $this->belongsTo(Padlet::class);
    }

    /**
     * user has many entries
     */
    public function entries(): HasMany{
        return $this->hasMany(Entrie::class);
    }

    /**
     * user has many userrights
     */
    public function userrights(): HasMany{
        return $this->hasMany(Userright::class);
    }

    /**
     * a user has many ratings
     */
    public function ratings(): HasMany{
        return $this->hasMany(Rating::class);
    }

    /**
     * a user has many comments
     */
    public function comments(): HasMany{
        return $this->hasMany(Comment::class);
    }

    /* ---- auth JWT ---- */
    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return ['user' => ['id' => $this->id]];
    }
}


