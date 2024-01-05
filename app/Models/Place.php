<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'user_id',
        'description',
        'parent_id'
    ];



    /**
     * The subplaces that belong to the Place
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subplaces(): HasMany
    {
        return $this->hasMany(Place::class,  'parent_id');
    }
}
