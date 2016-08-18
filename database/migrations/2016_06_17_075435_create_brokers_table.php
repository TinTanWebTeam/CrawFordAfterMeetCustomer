<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brokers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50)->unique();
            $table->string('firstName',50);
            $table->string('lastName',50);
            $table->string('phone',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('address',300)->nullable();
            $table->string('bankAccountNumber',50)->nullable();
            $table->string('bankCardNumber',50)->nullable();
            $table->string('bankAccountName',100)->nullable();
            $table->string('bankName',100)->nullable();
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
        Schema::drop('brokers');
    }
}
