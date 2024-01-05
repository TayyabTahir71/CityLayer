<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlaceDetailPlace extends Model
{
    use HasFactory;
    protected $fillable = ['place_detail_id', 'place_id', 'place_child_id'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    public function placeChild(): BelongsTo
    {
        return $this->belongsTo(Place::class,'place_child_id');
    }

    

}
