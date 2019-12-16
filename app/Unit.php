<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'id_unit','name'
    ];

    public function courses(){
        return $this->hasMany('App\Course');
    }
}
