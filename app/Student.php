<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id_user','name','email','nilai_siswa','update_nilai_siswa'
    ];

    public function courses(){
        return $this->belongsToMany('App\Course','student_courses',
            'id_student','id_course');
    }

    public function reports(){
        return $this->hasMany('App\Report');
    }
}
