<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlaceDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'user_id',
        'observation_id',
        'image',
        'latitude',
        'longitude',
    ];


    /**
     * Get the place that owns the PlaceDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }


    /**
     * Get the observation that owns the PlaceDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function observation(): BelongsTo
    {
        return $this->belongsTo(Observation::class);
    }
}
