<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'place_id',
        'path'
    ];

    /**
     * Summary of place
     * @return BelongsTo<Place, Image>
     */
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
}
