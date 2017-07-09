<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FareRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fare_rates',function($table)
        {
            $table->increments('id');
            $table->string('upto5');
            $table->string('fiveto15');
            $table->string('fifteento100');
            $table->string('above100');
            $table->string('pickup');
            $table->boolean('active');
            $table->timestamps();
        });
        DB::table('fare_rates')->insert(['upto5'=>'10','fiveto15'=>'2','fifteento100'=>'1.5','above100'=>'1','pickup'=>'10','active'=>true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fare_rates');
    }
}






