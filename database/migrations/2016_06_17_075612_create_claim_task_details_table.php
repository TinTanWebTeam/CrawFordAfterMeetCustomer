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
            $table->decimal('professionalServicesTime')->nullable();
            $table->decimal('professionalServicesTimeBillValue')->nullable();
            $table->decimal('professionalServicesTimeOverrideValue')->nullable();

            $table->string('professionalServicesNote')->nullable();
            //rate
            $table->decimal('professionalServicesRate')->nullable();
            $table->decimal('professionalServicesRateBillValue')->nullable();
            $table->decimal('professionalServicesRateOverrideValue')->nullable();
            //amount
            $table->decimal('professionalServicesAmount')->nullable();
            $table->decimal('professionalServicesAmountBillValue')->nullable();
            $table->decimal('professionalServicesAmountOverrideValue')->nullable();

            $table->integer('expense')->nullable();// cong viec phu

            $table->decimal('expenseAmount')->nullable();
            $table->decimal('expenseAmountBillValue')->nullable();
            $table->decimal('expenseAmountOverrideValue')->nullable();

            $table->string('expenseNote')->nullable();

            $table->boolean('active')->default(1);
            $table->integer('claimId')->default(0);//if not equal 0 will be reference to id in Claim
            $table->integer('statusId')->default(0); //if not equal 0 will be reference to id in status
            $table->integer('userId')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('createdBy')->default(0); //if not equal 0 will be reference to id in user
            $table->integer('updatedBy')->default(0); //if not equal 0 will be reference to id in user

            //Date bill dsd
            $table->dateTime('billDate')->nullable();
            $table->string('invoiceMajorNo')->nullable();
            $table->dateTime('invoiceDate')->nullable();

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
