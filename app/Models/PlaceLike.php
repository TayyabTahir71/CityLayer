<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceLike extends Model
{
    use HasFactory;
    protected $fillable = ['place_detail_id', 'user_id'];
}
