<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50)->unique();
            $table->string('fullName',100)->nullable();
            $table->string('address',500)->nullable();;
            $table->string('phone',50)->nullable();;
            $table->string('email',100)->nullable();;
            $table->string('addressReserve',500)->nullable();
            $table->string('phoneReserve',50)->nullable();
            $table->string('emailReserve',50)->nullable();
            $table->string('bankAccountNumber',50)->nullable();
            $table->string('bankCardNumber',50)->nullable();
            $table->string('bankAccountName',100)->nullable();
            $table->string('bankName',100)->nullable();

            $table->string('contactPersonFirstName',50)->nullable();
            $table->string('contactPersonLastName',50)->nullable();
            $table->string('contactPersonPhone',50)->nullable();
            $table->string('contactPersonEmail',100)->nullable();

            $table->string('contactPersonFirstNameReserve',50)->nullable();
            $table->string('contactPersonLastNameReserve',50)->nullable();
            $table->string('contactPersonPhoneReserve',50)->nullable();
            $table->string('contactPersonEmailReserve',100)->nullable();
            $table->string('sourceCustomerId',50)->nullable();

            $table->integer('createdBy')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('updatedBy')->default(0); //if not equal 0 will be reference to id in user
            $table->boolean('active')->default(1);
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
        Schema::drop('customers');
    }
}
