<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlaceDetailObservation extends Model
{
    use HasFactory;
    protected $fillable = ['place_detail_id', 'observation_id', 'observation_child_id', 'feeling_id'];



    public function observation(): BelongsTo
    {
        return $this->belongsTo(Observation::class);
    }
    public function observationChild(): BelongsTo
    {
        return $this->belongsTo(Observation::class,'observation_child_id');
    }
    
    public function feeling(): BelongsTo
    {
        return $this->belongsTo(Feeling::class);
    }
}
