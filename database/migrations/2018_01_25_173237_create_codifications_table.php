<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codification_periode_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->timestamps();

            $table->foreign('codification_periode_id')->references('id')->on('codification_periodes')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

            $table->unique(['codification_periode_id', 'student_id']);
            $table->unique(['codification_periode_id', 'position_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codifications');
    }
}
