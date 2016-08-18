<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineOfBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_of_businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50)->unique();
            $table->string('name',100);
            $table->string('description',1000)->nullable();
            $table->integer('createdBy')->default(0);
            $table->integer('updatedBy')->default(0);
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
        Schema::drop('line_of_businesses');
    }
}
