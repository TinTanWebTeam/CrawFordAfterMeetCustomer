<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('firstName',50);
            $table->string('lastName',50);
            $table->string('salutation',50)->nullable();
            $table->string('middleInitial',50)->nullable();
            $table->string('designations',500)->nullable();
            $table->string('sex',20)->nullable();
            $table->dateTime('birthDate')->nullable();
            $table->string('company',500)->nullable();
            $table->string('title',500)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('address',500)->nullable();
            $table->dateTime('bonusDate')->nullable();
            $table->integer('userID_created')->default(0);//if not equal 0 will be reference to id in user
            $table->string('networkID_created',500)->nullable();
            $table->integer('userID_changed')->default(0);//if nor equal 0 will be reference to id in user
            $table->string('networkID_changed',500)->nullable();
            $table->boolean('locked')->default(1);
            $table->string('lockedDetail',500)->nullable();
            $table->boolean('inactive')->default(1);
            $table->string('inactiveDetail',500)->nullable();
            $table->boolean('defaultProfile')->default(1);
            $table->boolean('active')->default(1);

            $table->integer('positionId')->unsigned();
            $table->integer('roleId')->unsigned();


            $table->rememberToken();
            $table->timestamps();
            $table->foreign('roleId')->references('id')->on('roles')->onDelete('no action');
            $table->foreign('positionId')->references('id')->on('positions')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
