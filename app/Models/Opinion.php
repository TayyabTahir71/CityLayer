<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'opinions';
    // protected $primaryKey = 'id';
     public $timestamps = false;
    protected $guarded = ['id'];
     protected $fillable = [
        'name',
     ];
    // protected $hidden = [];
    // protected $dates = [];

}