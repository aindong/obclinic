<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('PatientsTableSeeder');
		$this->call('QueuesTableSeeder');
        $this->call('AllergiesTableSeeder');
        $this->call('DiseasesTableSeeder');
        $this->call('MedicinesTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
	}

}
