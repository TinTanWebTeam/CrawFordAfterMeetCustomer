<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelRelatedExpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_related_exps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('billId');//if not null to reference to id in bill
            $table->integer('userId');//if not null to reference to id in user
            $table->decimal('value')->default(0);
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
        Schema::drop('travel_related_exps');
    }
}
