<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbitagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arbitag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usd');
            $table->integer('cad');
            $table->integer('eur');
            $table->integer('lir');
            $table->integer('gbp');
            $table->integer('iqd');
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
        Schema::dropIfExists('arbitag');
    }
}
