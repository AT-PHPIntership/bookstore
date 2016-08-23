<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 256);
            $table->text('description');
            $table->string('state', 45);
            $table->string('type', 10);
            $table->integer('price');
            $table->string('slug', 256);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('articles');
    }
}
