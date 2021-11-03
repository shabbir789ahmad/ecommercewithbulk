<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_sales', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_sell_id');
            $table->string('vendor_new_price');
            $table->string('vendor_discount');
            $table->string('vendor_on_sale');
            $table->bigInteger('vendor_sale_id')->unsigned();
            $table->foreign('vendor_sale_id')->references('id')->on('stocks')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('vendor_sales');
    }
}
