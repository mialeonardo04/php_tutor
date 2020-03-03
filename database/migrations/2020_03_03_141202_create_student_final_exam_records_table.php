<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFinalExamRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_final_exam_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_student')->nullable();
            $table->integer('id_tipe')->nullable();
            $table->integer('jumlah_benar')->nullable();
            $table->tinyInteger('try_count')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_final_exam_records');
    }
}
