<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;


class Infosperso extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'infosperso';
    // protected $primaryKey = 'id';
     public $timestamps = false;
    protected $guarded = ['id'];
     protected $fillable = [
        'user_id',
        'age',
        'gender',
        'profession',
        'relation',
        'preferences',
        'pays',
        'telephone',
     ];
    // protected $hidden = [];
    // protected $dates = [];
   

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}