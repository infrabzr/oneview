<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorclientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendorclients', function (Blueprint $table) {	
			 $table->bigIncrements('id');
			 $table->string('name');
			 $table->string('mobile');
			 $table->string('city');
			 $table->string('state');
			 $table->string('address');
			 $table->string('logo');
			 $table->string('status');
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
        Schema::dropIfExists('vendorclients');
    }
}
