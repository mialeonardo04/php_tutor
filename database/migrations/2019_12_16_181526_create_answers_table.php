<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_unit')->unsigned();
            $table->integer('id_student')->unsigned();
            $table->integer('id_quiz')->unsigned();
            $table->integer('id_choice')->unsigned();
            $table->timestamps();

            $table->foreign('id_unit')
                ->references('id')
                ->on('units')
                ->onDelete('cascade');

            $table->foreign('id_student')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->foreign('id_quiz')
                ->references('id')
                ->on('quizzes')
                ->onDelete('cascade');

            $table->foreign('id_choice')
                ->references('id')
                ->on('quizzes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
