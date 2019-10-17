<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('address_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('photos')->nullable();
            $table->text('comment');
            $table->integer('rate');
            $table->timestamps();
        });

        Schema::table('address_reviews', function(Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_reviews');
    }
}
