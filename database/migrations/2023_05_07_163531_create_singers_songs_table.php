<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singers_songs', function (Blueprint $table) {
            $table->unsignedBigInteger('singer_id');
            $table->unsignedBigInteger('song_id');

            $table->foreign('singer_id')->references('id')->on('singers')->delete('cascade');
            $table->foreign('song_id')->references('id')->on('songs')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('singers_songs');
    }
};
