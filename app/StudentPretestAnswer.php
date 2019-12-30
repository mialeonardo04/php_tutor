<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPretestAnswer extends Model
{
    protected $fillable = [
        'id_student','id_unit','jumlah_benar'
    ];
}
