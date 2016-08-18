<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeOfDamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_damages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50)->unique();
            $table->string('name',100);
            $table->string('description')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('createdBy')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('updatedBy')->default(0); //if not equal 0 will be reference to id in user
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
        Schema::drop('type_of_damages');
    }
}
