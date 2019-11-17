<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_en')->nullable()->default(null);
            $table->string('photos')->nullable();
            $table->string('detail');
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('verified')->default(0);
            $table->bigInteger('verified_by')->nullable()->unsigned();
            $table->dateTime('verified_time')->nullable()->default(null);
            $table->string('location', 50)->unique();
            $table->float('rate', 2, 1)->nullable();
            $table->timestamps();
        });

        Schema::table('addresses', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('verified_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}