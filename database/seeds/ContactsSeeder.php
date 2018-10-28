<?php

use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Contacts::create([
            'nama' => 'Abc',
            'email' => 'abc@gmail.com',
            'comment' => 'Terimakasih'
            
        ]);
        App\Contacts::create([
            'nama' => 'Abdc',
            'email' => 'abdc@gmail.com',
            'comment' => 'Terimakasih'
            
        ]);

            }
}
