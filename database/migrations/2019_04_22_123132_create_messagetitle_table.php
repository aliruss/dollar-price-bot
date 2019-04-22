<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagetitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagetitle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usd');
            $table->string('fullcoin');
            $table->string('geram');
            $table->string('mes');
            $table->string('lir');
            $table->string('iqd');
            $table->string('optone');
            $table->string('opttwo');
            $table->string('optthree');
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
        Schema::dropIfExists('messagetitle');
    }
}
