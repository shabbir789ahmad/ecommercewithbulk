<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiddleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
         Schema::create('middle_categories', function (Blueprint $table) {
            $table->id();
            $table->string('middlecategory_name');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->
            references('id')->on('categories')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('middle_categories');
    }
}
