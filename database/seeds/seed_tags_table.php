<?php

use Illuminate\Database\Seeder;

class seed_tags_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
           'name' => 'PHP'
       ]);

        DB::table('tags')->insert([
           'name' => 'HTML'
       ]);

        DB::table('tags')->insert([
           'name' => 'Ruby'
       ]);

        DB::table('tags')->insert([
           'name' => 'Javascript'
       ]);

        DB::table('tags')->insert([
           'name' => 'Java'
       ]);

        DB::table('tags')->insert([
           'name' => 'CSS'
       ]);

        // Seed pivot 
        // 
        DB::table('post_tag')->insert([
           'post_id' => 1,
           'tag_id' => 1
       ]);

        DB::table('post_tag')->insert([
           'post_id' => 1,
           'tag_id' => 2
       ]);


        DB::table('post_tag')->insert([
           'post_id' => 1,
           'tag_id' => 3
       ]);


        DB::table('post_tag')->insert([
           'post_id' => 1,
           'tag_id' => 4
       ]);


        DB::table('post_tag')->insert([
           'post_id' => 1,
           'tag_id' => 5
       ]);


        DB::table('post_tag')->insert([
           'post_id' => 1,
           'tag_id' => 6
       ]);
    }
}
