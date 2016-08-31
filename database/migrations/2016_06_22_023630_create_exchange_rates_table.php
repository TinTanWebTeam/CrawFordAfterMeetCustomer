<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50)->unique();
            $table->string('name',500);
            $table->decimal('value',18,0);
            $table->string('description')->nullable();
            $table->boolean('active')->default(1);// if not null will be reference to properties code of table claims
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
        Schema::drop('exchange_rates');
    }
}
