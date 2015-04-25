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
           'name' => 'admin'
        ]);

        Role::create([
           'name' => 'physician'
        ]);

        Role::create([
           'name' => 'assistant'
        ]);
    }

}
