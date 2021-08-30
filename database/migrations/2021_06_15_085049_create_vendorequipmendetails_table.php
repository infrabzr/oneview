<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorequipmendetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendorequipmendetails', function (Blueprint $table) {
              $table->bigIncrements('veq_details_id');
			$table->string('ve_rental_start_date');
			$table->string('ve_rental_end_date');
			$table->string('ve_noofdays');
			$table->string('ve_rental_cost');
			$table->string('ve_billing_cycle');
			$table->string('rc_start_date');
			$table->string('rc_end_date');
			$table->string('ins_start_date');
			$table->string('ins_end_date');
			$table->string('tax_start_date');
			$table->string('tax_end_date');
			$table->string('permit_start_date');
			$table->string('permit_end_date');
			$table->string('fitness_start_date');
			$table->string('fitness_end_date');
			$table->string('ve_vehicle_rc');
			$table->string('ve_insurance');
			$table->string('ve_road_tax');
			$table->string('ve_road_permit');
			$table->string('ve_fitness');
			$table->string('ve_images'); 
			$table->integer('ve_id'); 
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
        Schema::dropIfExists('vendorequipmendetails');
    }
}
