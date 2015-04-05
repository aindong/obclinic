<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
            // Field definitions
            $table->string('patient_no', 20);
            $table->string('firstname', 30);
            $table->string('lastname', 30);
            $table->string('middlename', 30);
            $table->string('address', 150);
            $table->timestamp('birthdate');
            $table->string('contactno', 20);
            $table->string('email', 50);
            $table->string('picture', 200);
            $table->timestamps();

            // Index keys
            $table->primary('patient_no');
            $table->index(['firstname', 'lastname', 'middlename', 'email']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('patients');
	}

}
