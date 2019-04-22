<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagesetting', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('send');
            $table->boolean('usd');
            $table->boolean('fullcoin');
            $table->boolean('mes');
            $table->boolean('geram');
            $table->boolean('iqd');
            $table->boolean('lir');
            $table->boolean('optone');
            $table->boolean('opttwo');
            $table->boolean('optthree');
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
        Schema::dropIfExists('messagesetting');
    }
}
