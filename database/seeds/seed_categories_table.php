<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_categories_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categories')->insert([
           'name' => 'General',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);

          DB::table('categories')->insert([
           'name' => 'Cycling',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);

           DB::table('categories')->insert([
           'name' => 'Movies',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);

           DB::table('categories')->insert([
           'name' => 'Books',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);


           DB::table('categories')->insert([
           'name' => 'Food',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);


           DB::table('categories')->insert([
           'name' => 'Travel',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
   
  
    }
}
