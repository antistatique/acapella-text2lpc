<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyLibrary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_library', function (Blueprint $table) {
            $table->unsignedBigInteger('key_id')->nullable(false);
            $table->unsignedBigInteger('library_id')->nullable(false);
            $table->timestamps();

            $table->foreign('key_id')->references('id')->on('keys');
            $table->foreign('library_id')->references('id')->on('libraries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_library');
    }
}
