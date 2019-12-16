<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_question')->unsigned();
            $table->integer('id_quiz')->unsigned();
            $table->text('text');
            $table->tinyInteger('correct');
            $table->timestamps();

            $table->foreign('id_question')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');

            $table->foreign('id_quiz')
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
        Schema::dropIfExists('choices');
    }
}
