<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_favor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('favor_id')->unsigned()->index();
            $table->timestamps();
            
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('favor_id')->references('id')->on('microposts')->onDelete('cascade');
       
             $table->unique(['user_id', 'favor_id']);       
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_favor');
    }
}
