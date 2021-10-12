<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('products', function(Blueprint $table){
           $table->id();
            $table->string('name');
            $table->string('detail');
            $table->string('price');
            $table->string('discount');
            $table->string('stock');
            $table->string('ship');
            $table->string('product_status');
            $table->string('product_status')->nullable();
             $table->bigInteger('drop_id')->unsigned();
            $table->foreign('drop_id')->references('id')
            ->on('dropdowns')->onDelete('cascade')->onUpdate('cascade');
           
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
        Schema::dropIfExists('Products');
    }
}
