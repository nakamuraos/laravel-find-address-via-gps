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
            $table->integer('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('photos');
            $table->text('comment');
            $table->integer('rate');
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
        Schema::dropIfExists('address_reviews');
    }
}
