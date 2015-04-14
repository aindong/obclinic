<?php

use Aindong\Features\Diseases\Models\Disease;

class DiseasesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 1000; $i++) {
            Disease::create([
                'name'  => $faker->word
            ]);
        }
    }

}
