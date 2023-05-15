<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'user_id',
        'entrie_id',
    ];

    /**
     * a rating belongs to a user
     */
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    /**
     * a rating belongs to a entrie
     */
    public function entrie(): BelongsTo{
        return $this->belongsTo(Entrie::class);
    }
}
