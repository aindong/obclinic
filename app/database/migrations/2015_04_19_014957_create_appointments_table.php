<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function(Blueprint $table) {
            $table->increments('id');
            $table->string('patient_no', 20);
            $table->timestamp('appointment_date');
            $table->string('status', 20);
            $table->string('username', 50);
            $table->timestamps();

            $table->foreign('patient_no')->references('patient_no')->on('patients');
            $table->foreign('username')->references('username')->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('appointments');
	}

}
