<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Userright extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'padlet_it',
        'read',
        'edit',
        'delete'
    ];

    /**
     * userright to a user
     */
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    /**
     * a userright belongs to a padlet
     */
    public function padlet() : BelongsTo{
        return $this->belongsTo(Padlet::class);
    }
}
