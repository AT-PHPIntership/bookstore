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
            $table->string('state', 45)->default('hidden');
            $table->string('type', 10);
            $table->string('address');
            $table->double('lat', 10, 6)->nullable();
            $table->double('lng', 10, 6)->nullable();
            $table->integer('price')->nullable();
            $table->string('slug', 256);
            $table->integer('category_detail_id')->unsigned();
            $table->foreign('category_detail_id')->references('id')->on('category_details');
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
