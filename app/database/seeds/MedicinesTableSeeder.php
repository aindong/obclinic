<?php

use Aindong\Features\Medicines\Models\Medicine;

class MedicinesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Medicine::create([
                'name'  => $faker->word
            ]);
        }
    }

}
