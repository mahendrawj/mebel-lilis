<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample admin
        App\User::create([
            'name' => 'Admin',
            'email' => 'adminmebel@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);

        // sample customer
        App\User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'customer'
        ]);
    }
}
