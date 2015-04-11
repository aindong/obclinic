<?php

use Aindong\Features\Patients\Models\Patient;

class PatientsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Patient::create([
                'patient_no' => '20150400'.$i,
                'firstname'  => $faker->firstName,
                'lastname'  => $faker->lastName,
                'middlename' => $faker->lastName,
                'address' => $faker->address,
                'birthdate' => $faker->date(),
                'contactno' => $faker->phoneNumber,
                'email' => $faker->email,
                'picture' => 'no.jpg'
            ]);
        }
    }

}
