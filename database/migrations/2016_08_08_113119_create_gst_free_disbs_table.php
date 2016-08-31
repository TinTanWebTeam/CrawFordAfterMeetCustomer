<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGstFreeDisbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_free_disbs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('billId');//if not null to reference to id in bill
            $table->integer('userId');//if not null to reference to id in user
            $table->decimal('value',18,0)->default(0);
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
        Schema::drop('gst_free_disbs');
    }
}
