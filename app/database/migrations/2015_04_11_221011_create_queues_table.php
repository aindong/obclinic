<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('queues', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamp('arrival');
            $table->string('patient_no', 20);
            $table->integer('vitalsign_id')->unsigned();
            $table->string('reservation_type');
            $table->timestamps();

            $table->foreign('vitalsign_id')->references('id')->on('patients_vitalsigns');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('queues');
	}

}
