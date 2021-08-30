<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientcontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientcontacts', function (Blueprint $table) {
            $table->id("clientcontacts_id");
			 $table->string('contacts_name');
			 $table->string('contacts_mobile');
			 $table->string('contacts_secondarymobile');
			 $table->string('contacts_email');
			 $table->string('contacts_designation');
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
        Schema::dropIfExists('clientcontacts');
    }
}
