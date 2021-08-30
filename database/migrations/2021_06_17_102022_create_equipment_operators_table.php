<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('equipment_operators', function (Blueprint $table) {
            $table->bigIncrements('operator_id');
			$table->string('ve_id');
			$table->string('operator_image');
			$table->string('operator_licence');
			$table->string('operator_name');
			$table->string('operator_phone');
			$table->string('operator_city');
			$table->string('operator_address');
			$table->string('operator_added_date');
			$table->string('operator_delete_date');
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
        Schema::dropIfExists('equipment_operators');
    }
}
