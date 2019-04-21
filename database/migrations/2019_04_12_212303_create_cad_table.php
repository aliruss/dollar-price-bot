<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bminprice');
            $table->integer('bmaxprice');
            $table->integer('smaxprice');
            $table->integer('sminprice');
            $table->integer('sanamax')->nullable();
            $table->integer('sanamin')->nullable();
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
        Schema::dropIfExists('cad');
    }
}
