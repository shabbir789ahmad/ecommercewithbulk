<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
         $table->id();
         $table->string('stock');
         $table->string('sold_stock')->default(0);
         $table->string('price');
         $table->string('discount_price');
         $table->bigInteger('product_id')->unsigned();
         $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
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
        //
    }
}
