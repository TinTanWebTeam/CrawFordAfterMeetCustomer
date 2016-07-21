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
            $table->decimal('professionalServicesTime')->nullable();
            $table->string('professionalServicesNote')->nullable();
            $table->integer('expense')->nullable();// cong viec phu
            $table->decimal('expenseTime')->nullable();
            $table->string('expenseNote')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('claimId')->default(0);//if not equal 0 will be reference to id in Claim
            $table->integer('statusId')->default(0); //if not equal 0 will be reference to id in status
            $table->integer('userId')->default(0); //if not equal 0 will be reference to id in user
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
        Schema::drop('claim_task_details');
    }
}
