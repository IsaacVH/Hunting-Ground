<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHuntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hunts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('creator')->references('id')->on('users')->onDelete('cascade');
            $table->datetime('start_date');
            $table->datetime('end_date');
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
        Schema::table('hunts', function (Blueprint $table) {
            $table->dropForeign('hunts_creator_foreign');
        });
        Schema::drop('hunts');
    }
}
