<?php

use Aindong\Features\Queues\Models\Queue;

class QueuesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Queue::create([
                'arrival' => $faker->dateTime(),
                'patient_no' => '20150400'.$i,
                'vitalsign_id'  => 0,
                'reservation_type'  => $faker->word
            ]);
        }
    }

}
