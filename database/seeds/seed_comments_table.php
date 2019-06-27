<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_comments_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
           'user_id' => 1,
           'post_id' => 52,
           'body' => '<p>This is a first comment</p>',
           'approved' => 1,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);

        DB::table('comments')->insert([
           'user_id' => 5,
           'post_id' =>52,
           'body' => '<p>This is a second comment</p>',
           'approved' => 1,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);

        DB::table('comments')->insert([
           'user_id' => 7,
           'post_id' =>52,
           'body' => '<p>This is a third comment</p>',
           'approved' => 1,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
    }
}

