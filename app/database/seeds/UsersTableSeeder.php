<?php

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            User::create([
                'username'      => $faker->userName,
                'password'      => Hash::make('test123'),
                'firstname'     => $faker->firstName,
                'lastname'      => $faker->lastName,
                'middlename'    => $faker->lastName,
                'role_id'       => $faker->randomElement([1, 2, 3])
            ]);
        }
    }

}
