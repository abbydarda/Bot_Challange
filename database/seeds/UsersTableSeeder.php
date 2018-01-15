<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'pril',
            'username'=> 'priland',
            'email'=> 'pril@email.com',
            'city'=> 'Bandung',
            'phone'=> '876543',
            'password'=> bcrypt('123'),
        ]);
    }
}
