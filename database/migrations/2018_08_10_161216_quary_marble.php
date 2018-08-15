<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuaryMarble extends Migration
{   
    public function up()
    {
        Schema::create('marble_quary', function (Blueprint $table) {
            $table->integer('quary_id')->unsigned();
            $table->integer('marble_id')->unsigned();
            $table->nullableTimestamps();

            $table->foreign('quary_id')->references('id')->on('quarries')->onDelete('cascade');;
            $table->foreign('marble_id')->references('id')->on('marbles')->onDelete('cascade');;

            $table->primary(['quary_id', 'marble_id']);
        });
    }

      /**
     * Reverse the migrations.
     *
     * @return void
     */
      public function down()
      {
        Schema::dropIfExists('marble_quary');
    }
}
