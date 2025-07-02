<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    protected $table = 'places';
    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];

    /**
     * Summary of user
     * @return BelongsTo<User, Place>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of image
     * @return HasMany<Image, Place>
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Summary of comment
     * @return HasMany<Comment, Place>
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
