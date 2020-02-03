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


            $table->integer('progress')->default(0);
            $table->integer('progress_pretest_unit')->default(1);
            $table->integer('unit_start')->default(1);
            $table->integer('avg_pretest')->nullable();
            $table->integer('avg_exercise')->nullable();
            $table->string('nilai_final')->nullable();
            $table->datetime('last_gocourse_at')->nullable();
            $table->integer('chapter_done_count')->default(0);
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
