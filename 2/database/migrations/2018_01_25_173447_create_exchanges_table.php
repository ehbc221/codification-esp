<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codification_periode_id')->unsigned();
            $table->integer('student_out_id')->unsigned();
            $table->integer('student_in_id')->unsigned()->nullable();
            $table->integer('room_student_out_id')->unsigned();
            $table->integer('room_student_in_id')->unsigned()->nullable();
            $table->enum('constraint_to', ['Batiment', 'Étage', 'Couloir', 'Chambre']);
            $table->integer('constraint_to_id')->unsigned();
            $table->timestamps();

            $table->foreign('codification_periode_id')->references('id')->on('codification_periodes')->onDelete('cascade');
            $table->foreign('student_out_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('student_in_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('room_student_out_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('room_student_in_id')->references('id')->on('rooms')->onDelete('cascade');

            $table->unique(['codification_periode_id', 'student_out_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
