<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LocationMarble extends Migration
{
    public function up()
    {
        Schema::create('location_marble', function (Blueprint $table) {
            $table->integer('location_id')->unsigned();
            $table->integer('marble_id')->unsigned();
            $table->nullableTimestamps();

            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');;
            $table->foreign('marble_id')->references('id')->on('marbles')->onDelete('cascade');;

            $table->primary(['location_id', 'marble_id']);
        });
    }

      /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_marble');
    }
}
