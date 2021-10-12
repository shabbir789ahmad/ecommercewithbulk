<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Submenue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('submenues', function (Blueprint $table) {
            $table->id();
            $table->string('smenue');
            $table->bigInteger('menue_id')->unsigned();
         $table->foreign('menue_id')->
          references('id')->on('categories')
          ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submenues');
        
    }
}
