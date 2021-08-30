<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorequipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		 Schema::create('vendorequipments', function (Blueprint $table) {
            $table->bigIncrements('ve_id');
			$table->string('ve_product_type');
			$table->string('ve_equipment_type');
			$table->string('ve_brand');
			$table->string('ve_year');
			$table->string('ve_model');
			$table->string('ve_capacity');
			$table->string('ve_service_duration');
			$table->string('ve_type_of_work');
			$table->string('ve_vehicle_number');
			$table->string('ve_expected_mileage');
			$table->string('ve_vendor_id'); 
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
        Schema::dropIfExists('vendorequipments');
    }
}
