<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestforequipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestforequipments', function (Blueprint $table) {
            $table->bigIncrements('r_id');
			$table->string('r_product_type');
			$table->string('r_equipment_type');
			$table->string('r_brand');
			$table->string('r_year');
			$table->string('r_model');
			$table->string('r_capacity'); 
			$table->string('r_work'); 
			$table->string('r_projecttype');
			$table->string('r_project');
			$table->string('r_comments');
			$table->string('r_vendor_id'); 
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
        Schema::dropIfExists('requestforequipments');
    }
}
