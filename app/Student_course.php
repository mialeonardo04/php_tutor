<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_course extends Model
{
    protected $fillable =[
        'id_student','id_course','nilai_awal','nilai_akhir','keterangan'
    ];
}
