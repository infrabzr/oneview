<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorequipmentLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
		  Schema::create('vendorequipment_loans', function (Blueprint $table) {
              $table->bigIncrements('loan_id');
			$table->string('ve_id');
			$table->string('bank_name');
			$table->string('bank_location');
			$table->string('total_loan_amount');
			$table->string('total_loan_amount_type');
			$table->string('loan_period');
			$table->string('loan_start_date');
			$table->string('loan_end_date');
			$table->string('emi_amount');
			$table->string('emi_amount_type');
			$table->string('emi_last_date');
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
        Schema::dropIfExists('vendorequipment_loans');
    }
}
