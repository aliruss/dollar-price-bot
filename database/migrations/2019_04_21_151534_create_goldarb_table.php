<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoldarbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goldarb', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fullcoin');
            $table->integer('oldfullcoin');
            $table->integer('halfcoin');
            $table->integer('quartercoin');
            $table->integer('geramcoin');
            $table->integer('geramgold');
            $table->integer('intergeram');
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
        Schema::dropIfExists('goldarb');
    }
}
