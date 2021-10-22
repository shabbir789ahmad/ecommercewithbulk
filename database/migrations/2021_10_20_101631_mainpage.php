<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mainpage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('mainpages', function (Blueprint $table) {
            $table->id();
            $table->string('c1');
            $table->string('c2');
            $table->string('c3');
            $table->string('c4');
            $table->string('c5');
           $table->bigInteger('tag3_id')->unsigned();
            $table->foreign('tag3_id')->
            references('id')->on('categories')
            ->onDelete('cascade')->onUpdate('cascade');
             $table->bigInteger('tag4_id')->unsigned();
            $table->foreign('tag4_id')->
            references('id')->on('categories')
            ->onDelete('cascade')->onUpdate('cascade');
             $table->bigInteger('tag5_id')->unsigned();
            $table->foreign('tag5_id')->
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
       
         Schema::dropIfExists('mainpages');
    }
}
