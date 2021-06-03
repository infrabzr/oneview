<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EquipmentBilling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('equipment_billing', function (Blueprint $table) {
			$table->bigIncrements('equ_bill_id');
			$table->string('start_date'); 
			$table->string('end_date'); 
			$table->string('equ_id'); 
			$table->string('billing_cycle'); 
			$table->string('billing_date');  
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
        //
    }
}
