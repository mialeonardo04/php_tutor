<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPretestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_pretest_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_student')->unsigned();
            $table->integer('id_unit')->unsigned();
            $table->integer('jumlah_benar');

            $table->foreign('id_student')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->foreign('id_unit')
                ->references('id')
                ->on('units')
                ->onDelete('cascade');

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
        Schema::dropIfExists('student_pretest_answers');
    }
}
