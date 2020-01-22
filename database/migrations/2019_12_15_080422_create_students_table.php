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
            $table->integer('progress_pretest_unit')->default(1);
            $table->integer('unit_start')->default(1);
            $table->integer('avg_pretest')->nullable();
            $table->integer('avg_exercise')->nullable();
            $table->string('nilai_final')->nullable();
            $table->datetime('last_gocourse_at')->nullable();
            $table->string('last_login_ip')->nullable();
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
