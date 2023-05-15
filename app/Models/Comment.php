<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'entrie_id',
        'comment'
    ];

    /**
     * a comment belongs to a user
     */
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    /**
     * a comment belongs to a entrie
     */
    public function entrie(): BelongsTo{
        return $this->belongsTo(Entrie::class);
    }
}
