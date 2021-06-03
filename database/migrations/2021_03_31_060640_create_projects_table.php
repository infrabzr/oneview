<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
			$table->bigIncrements('project_id');
			$table->string('project_code'); 
			$table->string('project_name'); 
			$table->string('project_type'); 
			$table->string('project_sites'); 
			$table->string('phase'); 
			$table->string('budget'); 
			$table->string('end_time'); 
			$table->string('project_address'); 
			$table->string('city'); 
			$table->string('state'); 
			$table->string('pincode'); 
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
        Schema::dropIfExists('projects');
    }
}
