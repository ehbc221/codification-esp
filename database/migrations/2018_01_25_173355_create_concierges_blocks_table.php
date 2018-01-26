<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConciergesBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concierges_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codification_periode_id')->unsigned();
            $table->integer('concierge_id')->unsigned();
            $table->integer('block_id')->unsigned();
            $table->timestamps();

            $table->foreign('codification_periode_id')->references('id')->on('codification_periodes')->onDelete('cascade');
            $table->foreign('concierge_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concierges_blocks');
    }
}
