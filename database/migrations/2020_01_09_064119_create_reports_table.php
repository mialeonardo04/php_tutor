<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_student')->nullable();
            $table->integer('id_unit')->nullable();
            $table->integer('id_course')->nullable();
            $table->integer('score')->nullable();
            $table->string('error_type', '100')->nullable();
            $table->text('error_desc')->nullable();
            $table->text('jawaban_siswa')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
