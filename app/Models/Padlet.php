<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Padlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_public',
        'user_id'
    ];

    /**
     * padlet has many entries
     */
    public function entries() : HasMany {
        return $this->HasMany(Entrie::class);
    }

    /**
     * padlet belongs to a user
     */
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * padlet has many userrights
     */
    public function userrights() : HasMany{
        return $this->hasMany(Userright::class);
    }

}
