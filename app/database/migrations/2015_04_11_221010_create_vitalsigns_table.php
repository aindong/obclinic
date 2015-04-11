<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVitalsignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients_vitalsigns', function(Blueprint $table) {
            $table->increments('id');
            $table->string('lmp');
            $table->string('height');
            $table->string('bmi');
            $table->string('bps');
            $table->string('bpd');
            $table->string('pulse');
            $table->string('respiration');
            $table->string('temperature');
            $table->string('comments');
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
		Schema::dropIfExists('patients_vitalsigns');
	}

}
