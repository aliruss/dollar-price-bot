<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOldfullcoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oldfullcoin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bminprice');
            $table->integer('bmaxprice');
            $table->integer('smaxprice');
            $table->integer('sminprice');
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
        Schema::dropIfExists('oldfullcoin');
    }
}
