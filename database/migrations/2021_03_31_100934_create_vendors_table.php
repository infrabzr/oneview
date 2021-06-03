<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
			$table->bigIncrements('vendor_id');
			$table->string('vendor_code'); 
			$table->string('vendor_name'); 
			$table->string('vendor_phone'); 
			$table->string('vendor_email'); 
			$table->string('address'); 
			$table->string('city'); 
			$table->string('state'); 
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
        Schema::dropIfExists('vendors');
    }
}
