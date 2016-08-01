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
            $table->string('code',20)->nullable();
            $table->string('branchSeqNo',20)->nullalbe();
            $table->string('incident',20)->nullable();
            $table->string('assignmentTypeCode',20)->nullable();
            $table->string('accountCode',20)->nullalbe();
            $table->string('accountPolicyId')->nullable();
            $table->string('insuredName',200)->nullable();
            $table->string('insuredClaim',100)->nullable();
            $table->string('tradingAs',100)->nullable();
            $table->string('claimTypeCode',20); //reference to code in insurance detail
            $table->string('lossDescCode',20); //reference to code in type of damage
            $table->string('catastrophicLoss')->nullalbe(); //reference to code in extend of damage
            $table->string('sourceCode',20); //reference to code in source customer
            $table->string('insurerCode',20); //reference to code in customer
            $table->string('brokerCode',20)->nullable(); //if not null will be reference to code in broker
            $table->string('branchCode',20)->nullable(); //if not null will be reference to code in branch
            $table->string('branchTypeCode',20)->nullable(); //if not null will be reference to code in branch type
            $table->dateTime('destroyedDate')->nullable();
            $table->string('lossLocation')->nullable();
            $table->string('lineOfBusinessCode',20)->nullable(); //if not null will be reference to code in line of business
            $table->dateTime('lossDate')->nullable();
            $table->dateTime('receiveDate')->nullable();
            $table->dateTime('openDate')->nullable();
            $table->dateTime('closeDate')->nullable();
            $table->dateTime('insuredContactedDate')->nullable();
            $table->dateTime('limitationDate')->nullable();
            $table->dateTime('policyInceptionDate')->nullable();
            $table->dateTime('policyExpiryDate')->nullable();
            $table->string('disabilityCode',20)->nullable();
            $table->string('outComeCode',20)->nullable();
            $table->dateTime('lastChanged')->nullable();
            $table->string('partnershipId',20)->nullable();
            $table->string('adjusterCode',20)->nullable(); //if not null will be reference to code in user
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
            $table->boolean('claimAssignment')->defaulr(1);
            $table->string('policy',500)->nullable();
            $table->dateTime('reOpen')->nullable();
            $table->dateTime('eBoxDestroyed')->nullable();
            $table->dateTime('firstContact')->nullable();
            $table->dateTime('proscription')->nullable();
            $table->decimal('initialReserve')->nullable();
            $table->decimal('currentRes')->nullable();
            $table->decimal('adjustReserve')->nullable();

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
