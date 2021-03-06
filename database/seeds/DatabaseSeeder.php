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
        $this->call(AdminUserSeeder::class);
        $this->call(NormalUserSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(MovieSeeder2::class);
    }
}
