<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'postId'=> 1,
            'id'=> 1,
            'userId'=> 1,
            'body'=> 'This is first comment',
        ]);
    }
}
