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
            $table->decimal('percentage',18,0)->nullable();
            $table->string('billToId',50)->nullable(); //if not null will be reference to code in customer
            $table->string('claimOfficer',100)->nullable(); //name customer charge of the project
            $table->string('policyNumber',50)->nullable();
            $table->string('CompClaimNumber',200)->nullable();
            $table->string('claimId')->nullable(); //if not null will be reference to id in claim
            $table->string('active')->default(1);

            $table->integer('billId')->default(0);
            $table->integer('rateBill')->nullable();//if not null will be reference to id in rate detail
            $table->integer('rateTypeBill')->nullable();//if not null will be reference to id in rate type
            $table->decimal('professionalServices',18,0)->default(0);
            $table->decimal('generalExp',18,0)->default(0);
            $table->decimal('comm&&PhotoExp',18,0)->default(0);
            $table->decimal('consultFees&&Exp',18,0)->default(0);
            $table->decimal('travelRelatedExp',18,0)->default(0);
            $table->decimal('gSTFreeDisb',18,0)->default(0);
            $table->decimal('disbursements',18,0)->default(0);
            $table->decimal('total',18,0)->default(0);

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
