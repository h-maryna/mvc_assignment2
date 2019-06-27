<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_users_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
           'name' => 'Maryna Hiadshevska',
           'email' => 'maryna@example.com',
           'password' => bcrypt('mypass'),
           'remember_token'=> Str::random(10),
           'is_admin'=> true,
           'created_at' => Carbon::now()
          
        ]);
    }
}
