<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable=[
        'id_student','id_unit','id_course','score','error_type','try_count',
    ];
    public function students(){
        return $this->belongsTo('App\Student','id_student','id');
    }

    public function units(){
        return $this->belongsTo('App\Unit','id_unit','id');
    }

    public function courses(){
        return $this->belongsTo('App\Course','id_course','id_course');
    }

}
