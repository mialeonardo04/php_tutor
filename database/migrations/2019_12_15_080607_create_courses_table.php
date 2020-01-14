<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id_course');
            $table->integer('id_unit');
            $table->string('description');
            $table->integer('tipe_soal');
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->integer('answer_errorstatus')->nullable();
            $table->integer('answer_outputstatus')->nullable();
            $table->string('embed_url')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
