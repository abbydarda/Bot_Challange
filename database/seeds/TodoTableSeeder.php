<?php

use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            'userId'=> 1,
            'id'=> 1,
            'title'=> 'first todo this',
            'completed'=> false,
        ]);
    }
}
