<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_details', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('value',18,2)->nullable();
            $table->string('description',1000)->nullable();
            $table->boolean('active')->default(1);
            $table->integer('rateTypeId')->unsigned();
            $table->integer('userId')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('claimId')->default(0); //if not equal 0 will be reference to id in claim
            $table->integer('createdBy')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('updatedBy')->default(0); //if not equal 0 will be reference to id in user
            $table->timestamps();

            $table->foreign('rateTypeId')->references('id')->on('rate_types')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rate_details');
    }
}
