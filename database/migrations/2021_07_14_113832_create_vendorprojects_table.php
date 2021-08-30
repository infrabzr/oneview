<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendorprojects', function (Blueprint $table) {
			 $table->id("project_id");
			 $table->string('project_name');
			 $table->string('project_state');
			 $table->string('project_city');
			 $table->string('vendor_admin_id');
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
        Schema::dropIfExists('vendorprojects');
    }
}
