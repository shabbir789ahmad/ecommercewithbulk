<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Stocks extends Migration
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
            $table->string('product');
            $table->longtext('detail');
            $table->string('product_status');
            $table->string('size_image');
             $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('vendors')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('drop_id')->unsigned();
            $table->foreign('drop_id')->references('id')->on('dropdowns')->onDelete('cascade')->onUpdate('cascade');
             $table->bigInteger('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('stocks');
            }
}
