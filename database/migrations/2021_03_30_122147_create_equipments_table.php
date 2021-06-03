<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->bigIncrements('e_id');
			$table->string('e_product_type');
			$table->string('e_equipment_type');
			$table->string('e_brand');
			$table->string('e_year');
			$table->string('e_model');
			$table->string('e_capacity');
			$table->string('e_current_reading');
			$table->string('e_service_duration');
			$table->string('e_type_of_work');
			$table->string('e_uom');
			$table->string('e_wom');
			$table->string('e_vehicle_number');
			$table->string('e_expected_mileage');
			$table->string('e_project_code');
			$table->string('e_vendor_id'); 
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
        Schema::dropIfExists('equipments');
    }
}
