<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Entrie extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'padlet_id',
        'title',
        'content'
    ];

    /**
     * a entrie belongs to a user
     */
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    /**
     * a entrie belongs to a padlet
     */
    public function padlet(): BelongsTo{
        return $this->belongsTo(Padlet::class);
    }

    /**
     * a entrie has many ratings
     */
    public function ratings() : HasMany{
        return $this->hasMany(Rating::class);
    }

    /**
     * a entrie has many comments
     */
    public function comments() : HasMany{
        return $this->hasMany(Comment::class);
    }
}
