<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seed_categories_table::class);
        $this->call(seed_users_table::class);
        $this->call(seed_posts_table::class);
        $this->call(seed_comments_table::class);
        $this->call(seed_tags_table::class);
        factory(App\User::class, 50)->create();
        factory(App\Post::class, 100)->create();  // created 50 fake users
    }
}
