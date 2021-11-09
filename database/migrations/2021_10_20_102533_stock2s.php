<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Stock2s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('stock2s', function (Blueprint $table) {
         $table->id();
         $table->string('stock');
         $table->string('sold_stock')->default(0);
         $table->string('price');
         $table->string('sell_price');
         $table->string('ship');
         $table->string('discount')->nullable();
         $table->string('stock_status');
         $table->bigInteger('supply_id')->unsigned();
         $table->foreign('supply_id')->references('id')->on('supplies')->onUpdate('cascade')->onDelete('cascade');
         $table->bigInteger('stock_id')->unsigned();
         $table->foreign('stock_id')->references('id')->on('stocks')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('stock2s');
    }
}
