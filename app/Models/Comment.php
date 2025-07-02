<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'place_id',
        'content',
    ];

    /**
     * Summary of user
     * @return BelongsTo<User, Comment>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of place
     * @return BelongsTo<Place, Comment>
     */
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
}
