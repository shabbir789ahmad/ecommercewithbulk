<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Details extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->string('quentity');
            $table->string('price');      
            $table->string('image');
            $table->string('total');
            $table->string('ship');
            $table->string('color');
            $table->string('size');
            $table->string('detail');
            $table->string('product_id');
            $table->string('order_status');
            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('drop_id')->unsigned();
            $table->foreign('drop_id')->references('id')->on('dropdowns')->onUpdate('cascade')->onDelete('cascade');
            $table->datetime('deleted_at')->nullable();
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
        Schema::dropIfExists('details');
    }
}
