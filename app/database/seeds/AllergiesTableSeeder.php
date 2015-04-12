<?php

use Aindong\Features\Allergies\Models\Allergy;

class AllergiesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            Allergy::create([
                'type' => $faker->randomElement(['food', 'medicine', 'others']),
                'name'  => $faker->word
            ]);
        }
    }

}
