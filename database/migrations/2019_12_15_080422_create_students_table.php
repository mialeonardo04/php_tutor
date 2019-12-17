<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->timestamps();
            $table->string('name');
            $table->string('email');
            //progress
            //0=blm pretest, 1 blm unit 1 sudah pretest, 2 blm unit 2 sudah pretest
            $table->integer('progress')->default(0);
//            $table->integer('nilai_pretest')->nullable();
            $table->integer('unit_start')->default(1);
            $table->string('nilai_siswa')->nullable();
            $table->string('update_nilai_siswa')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
