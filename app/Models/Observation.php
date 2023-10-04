<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Observation extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'image',
        'user_id',
        'description',
    ];


    /**
     * The subobservs that belong to the Place
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subobservs(): HasMany
    {
        return $this->hasMany(Observation::class,  'parent_id');
    }
}
