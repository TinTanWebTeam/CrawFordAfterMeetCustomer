<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50)->nullable();
            $table->string('branchSeqNo',50)->nullable();
            $table->string('incident',50)->nullable();
            $table->string('assignmentTypeCode',50)->nullable();
            $table->string('accountCode',50)->nullable();
            $table->string('accountPolicyId')->nullable();
            $table->string('insuredFirstName',200)->nullable();
            $table->string('insuredLastName',200)->nullable();
            $table->string('insuredAddress')->nullable();
            $table->string('insuredClaim',100)->nullable();
            $table->string('tradingAs',100)->nullable();
            $table->string('claimTypeCode',50); //reference to code in insurance detail
            $table->string('lossDescCode',50); //reference to code in type of damage
            $table->string('catastrophicLoss')->nullable(); //reference to code in extend of damage
            $table->string('sourceCode',50); //reference to code in source customer
            $table->string('insurerCode',50); //reference to code in customer
            $table->string('brokerCode',50)->nullable(); //if not null will be reference to code in broker
            $table->string('branchCode',50)->nullable(); //if not null will be reference to code in branch
            $table->string('branchTypeCode',50)->nullable(); //if not null will be reference to code in branch type
            $table->dateTime('destroyedDate')->nullable();
            $table->string('lossLocation')->nullable();
            $table->string('lineOfBusinessCode',50)->nullable(); //if not null will be reference to code in line of business
            $table->dateTime('lossDate')->nullable();
            $table->dateTime('receiveDate')->nullable();
            $table->dateTime('openDate')->nullable();
            $table->dateTime('closeDate')->nullable();
            $table->dateTime('insuredContactedDate')->nullable();
            $table->dateTime('limitationDate')->nullable();
            $table->dateTime('policyInceptionDate')->nullable();
            $table->dateTime('policyExpiryDate')->nullable();
            $table->string('disabilityCode',50)->nullable();
            $table->string('outComeCode',50)->nullable();
            $table->dateTime('lastChanged')->nullable();
            $table->string('partnershipId',50)->nullable();
            $table->string('adjusterCode',50)->nullable(); //if not null will be reference to code in user
            $table->string('rate')->nullable(); //if not null will be reference to code in rate detail
            $table->string('feeType')->nullable(); //if not null will be reference to code in rate
            $table->boolean('taxable')->default(1);
            $table->decimal('estimatedClaimValue',18,2)->nullable();
            $table->integer('createdBy')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('updatedBy')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('statusId')->default(0); //if not equal 0 will be reference to id in status

            $table->boolean('privileged')->default(1);
            $table->string('organization',500)->nullable();
            $table->string('operatedAs',500)->nullable();
            $table->string('miscInfo',500)->nullable();
            $table->string('largeLossClaim',500)->nullable();
            $table->boolean('sirBreached')->default(1);
            $table->boolean('claimAssignment')->default(1);
            $table->string('policy',500)->nullable();
            $table->dateTime('reOpen')->nullable();
            $table->dateTime('eBoxDestroyed')->nullable();
            $table->dateTime('firstContact')->nullable();
            $table->dateTime('proscription')->nullable();
            $table->decimal('initialReserve')->default(0);
            $table->decimal('currentRes',18,0)->default(0);
            $table->decimal('adjustReserve',18,0)->default(0);
            $table->string('contact',200)->nullable();

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
        Schema::drop('claims');
    }
}
