<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'id_course','id_unit','question','answer','embed_url'
    ];
    public function students(){
        return $this->belongsToMany('App\Student','student_courses',
            'id_course','id_student');
    }
    public function reports(){
        return $this->hasMany('App\Report');
    }
}
