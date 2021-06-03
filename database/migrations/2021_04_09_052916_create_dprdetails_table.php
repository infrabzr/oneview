<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDprdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dprdetails', function (Blueprint $table) {
            $table->bigIncrements('dpr_id');
			$table->string('date'); 
			$table->string('start_time'); 
			$table->string('end_time'); 
			$table->string('start_reading'); 
			$table->string('end_reading'); 
			$table->string('totalwoh'); 
			$table->string('fuel'); 
			$table->string('litres'); 
			$table->string('fuel_reading'); 
			$table->string('logsheet'); 
			$table->string('added_by'); 
			$table->string('operator'); 
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
        Schema::dropIfExists('dprdetails');
    }
}
