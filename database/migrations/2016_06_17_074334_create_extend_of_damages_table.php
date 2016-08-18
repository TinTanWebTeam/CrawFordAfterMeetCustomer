<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtendOfDamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extend_of_damages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50)->unique();
            $table->string('name',100);
            $table->decimal('extendDamage')->default(0);
            $table->string('description',1000)->nullable();
            $table->integer('typeOfDamageId')->unsigned();
            $table->boolean('active')->default(1);
            $table->integer('createdBy')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('updatedBy')->default(0); //if not equal 0 will be reference to id in user
            $table->timestamps();

            $table->foreign('typeOfDamageId')->references('id')->on('type_of_damages')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('extend_of_damages');
    }
}
