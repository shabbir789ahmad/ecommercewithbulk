<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {

         
           
            $table->string('ip_address')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('controller')->nullable();
            $table->string('method')->nullable();
            $table->string('success')->nullable();
            $table->datetime('created_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('activity_logs');
    }
};
