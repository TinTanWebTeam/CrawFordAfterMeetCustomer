<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimTaskDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_task_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professionalServices')->nullable();//cong viec chinh if not equal 0 will be reference to id in task_category
            //unit time
            $table->decimal('professionalServicesTime',18,1)->nullable();
            $table->decimal('professionalServicesTimeBillValue',18,1)->nullable();
            $table->decimal('professionalServicesTimeOverrideValue',18,1)->nullable();

            $table->string('professionalServicesNote')->nullable();
            //rate
            $table->decimal('professionalServicesRate',18,0)->nullable();
            $table->decimal('professionalServicesRateBillValue',18,0)->nullable();
            $table->decimal('professionalServicesRateOverrideValue',18,0)->nullable();
            //amount
            $table->decimal('professionalServicesAmount',18,0)->nullable();
            $table->decimal('professionalServicesAmountBillValue',18,0)->nullable();
            $table->decimal('professionalServicesAmountOverrideValue',18,0)->nullable();

            $table->integer('expense')->nullable();// cong viec phu

            $table->decimal('expenseAmount',18,0)->nullable();
            $table->decimal('expenseAmountBillValue',18,0)->nullable();
            $table->decimal('expenseAmountOverrideValue',18,0)->nullable();

            $table->string('expenseNote')->nullable();

            $table->boolean('active')->default(0);
            $table->integer('claimId')->default(0);//if not equal 0 will be reference to id in Claim
            $table->integer('statusId')->default(0); //if not equal 0 will be reference to id in status
            $table->integer('userId')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('createdBy')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('updatedBy')->default(0); //if not equal 0 will be reference to id in user

            //Date bill dsd
            $table->dateTime('billDate')->nullable();
            $table->integer('invoiceMajorNo')->nullable();
            $table->dateTime('invoiceDate')->nullable();

            $table->integer('invoiceTempNo')->nullable();
            $table->boolean('lockInvoiceNo')->default(0);
            $table->integer('invoiceTempNoBeforeOverRide')->nullable();


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
        Schema::drop('claim_task_details');
    }
}
