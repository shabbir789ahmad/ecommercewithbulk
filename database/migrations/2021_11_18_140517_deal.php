<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Deal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals',function(Blueprint $table){
            $table->id();
            $table->string('deal_name');
            $table->string('deal_detail');
            $table->string('deal_image');
            $table->date('deal_end_date');
            $table->bigInteger('deal_vendor_id')->unsigned();
            $table->foreign('deal_vendor_id')->references('id')->on('vendors')->onUpdate('cascade')->onUpdate('cascade');
            $table->bigInteger('deal_id')->unsigned();
            $table->foreign('deal_id')->references('id')->on('stocks')->onUpdate('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('deals');
    }
}
