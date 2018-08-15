<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Popups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('popups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_tr')->nullable();
            $table->string('title_en')->nullable();
            $table->string('image_path_tr')->nullable();
            $table->string('image_path_en')->nullable();
            $table->string('video_path')->nullable();
            $table->string('link')->nullable();
            $table->integer('duration')->nullable();
            $table->boolean('publish')->default(false);
            $table->integer('position')->default(1);
            $table->date('publish_at')->nullable();
            $table->date('publish_until')->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->nullableTimestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('popups');
    }
}
