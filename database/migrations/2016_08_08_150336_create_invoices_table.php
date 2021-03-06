<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idBill');
            $table->dateTime('invoiceDay');
            $table->integer('invoiceMajorNo')->nullable();
            $table->integer('invoiceTempNo')->nullable();
            $table->string('corInsurer',500);//sdsd
            $table->string('nameBank',500)->nullable();
            $table->string('addressBank',500)->nullable();
            $table->decimal('exchangeRate',18,0)->nullable();
            $table->dateTime('dateExchangeRate')->nullable();
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
        Schema::drop('invoices');
    }
}
