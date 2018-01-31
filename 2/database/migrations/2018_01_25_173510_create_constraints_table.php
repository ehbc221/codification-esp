<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constraints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codification_periode_id')->unsigned();
            $table->string('comment');
            $table->enum('constraint_from', ['Departement', 'Formation', 'Grade', 'Sex']);
            $table->integer('constraint_from_id')->unsigned();
            $table->enum('constraint_to', ['Block', 'Floor', 'Lane', 'Room', 'Block_Places', 'Room_Places']);
            $table->integer('constraint_to_id')->unsigned();
            $table->timestamps();

            $table->foreign('codification_periode_id')->references('id')->on('codification_periodes')->onDelete('cascade');

            $table->unique(['codification_periode_id', 'constraint_from', 'constraint_to'], 'codification_constraints');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constraints');
    }
}
