<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientcontactdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientcontactdetails', function (Blueprint $table) {
           $table->bigIncrements('ccd_id');
			 $table->string('name');
			 $table->string('mobile');
			 $table->string('secondrymobile');
			 $table->string('email');
			 $table->string('designation');
			 $table->foreign('ccd_id')->references('id')->on('vendorclients');
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
        Schema::dropIfExists('clientcontactdetails');
    }
}
