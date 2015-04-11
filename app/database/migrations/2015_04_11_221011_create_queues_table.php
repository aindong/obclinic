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
            $table->integer('vitalsign_id');
            $table->string('reservation_type');
            $table->timestamps();

            $table->foreign('patient_no')->references('patient_no')->on('patients');
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
