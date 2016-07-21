<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('percentage',18,2)->nullable();
            $table->string('billToId',20)->nullable(); //if not null will be reference to code in customer
            $table->string('claimOfficer',100)->nullable(); //name customer charge of the project
            $table->string('policyNumber',50)->nullable();
            $table->string('CompClaimNumber',200)->nullable();
            $table->string('claimId')->nullable(); //if not null will be reference to id in claim
            $table->string('active')->defaul(1);
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
        Schema::drop('bills');
    }
}
