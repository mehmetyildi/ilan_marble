<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('banners', function(Blueprint $table){
            $table->string('url_tr')->nullable();
            $table->string('url_en')->nullable();
        });
        Schema::table('abouts', function(Blueprint $table){
            $table->string('url_tr')->nullable();
            $table->string('url_en')->nullable();
        });
        Schema::table('events', function(Blueprint $table){
            $table->string('url_tr')->nullable();
            $table->string('url_en')->nullable();
        });
        Schema::table('locations', function(Blueprint $table){
            $table->string('url_tr')->nullable();
            $table->string('url_en')->nullable();
        });
        Schema::table('mags', function(Blueprint $table){
            $table->string('url_tr')->nullable();
            $table->string('url_en')->nullable();
        });
        Schema::table('projects', function(Blueprint $table){
            $table->string('url_tr')->nullable();
            $table->string('url_en')->nullable();
        });
        Schema::table('quarries', function(Blueprint $table){
            $table->string('url_tr')->nullable();
            $table->string('url_en')->nullable();
        });
        Schema::table('quarryimages', function(Blueprint $table){
            $table->string('url_tr')->nullable();
            $table->string('url_en')->nullable();
        });
        Schema::table('marbles', function(Blueprint $table){
            $table->string('url_tr')->nullable();
            $table->string('url_en')->nullable();
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
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('url_tr');
            $table->dropColumn('url_en');
        });
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('url_tr');
            $table->dropColumn('url_en');
        });
        Schema::table('quarryimages', function (Blueprint $table) {
            $table->dropColumn('url_tr');
            $table->dropColumn('url_en');
        });
        Schema::table('quarries', function (Blueprint $table) {
            $table->dropColumn('url_tr');
            $table->dropColumn('url_en');
        });
        Schema::table('mags', function (Blueprint $table) {
            $table->dropColumn('url_tr');
            $table->dropColumn('url_en');
        });
        Schema::table('marbles', function (Blueprint $table) {
            $table->dropColumn('url_tr');
            $table->dropColumn('url_en');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('url_tr');
            $table->dropColumn('url_en');
        });
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('url_tr');
            $table->dropColumn('url_en');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('url_tr');
            $table->dropColumn('url_en');
        });
    }
}
