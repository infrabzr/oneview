<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments_details', function (Blueprint $table) {
            $table->bigIncrements('eq_details_id');
			$table->string('e_rental_start_date');
			$table->string('e_rental_end_date');
			$table->string('e_rental_cost');
			$table->string('e_billing_cycle');
			$table->string('e_vehicle_rc');
			$table->string('e_insurance');
			$table->string('e_road_tax');
			$table->string('e_road_permit');
			$table->string('e_fitness');
			$table->string('e_images'); 
			$table->integer('e_id'); 
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
        Schema::dropIfExists('equipments_details');
    }
}
