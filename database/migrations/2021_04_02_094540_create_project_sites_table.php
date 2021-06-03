<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_sites', function (Blueprint $table) {
            $table->bigIncrements('site_id');
			$table->string('project_id');
			$table->string('project_name');
			$table->string('site_code');
			$table->string('site_name');
			$table->string('field_supervisor');
			$table->string('primary');
			$table->string('secondary'); 
			$table->string('email');  
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
        Schema::dropIfExists('project_sites');
    }
}
