<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeling extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'star', 'image'];

    public function placeDetails()
    {
        return $this->hasMany(PlaceDetail::class, 'feeling_id');
    }
}
