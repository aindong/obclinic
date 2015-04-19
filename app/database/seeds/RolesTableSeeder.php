<?php

class RolesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
           'name' => 'super admin'
        ]);

        Role::create([
           'name' => 'doctor'
        ]);

        Role::create([
           'name' => 'assistant'
        ]);
    }

}
