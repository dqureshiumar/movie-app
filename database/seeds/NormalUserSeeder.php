<?php

use Illuminate\Database\Seeder;
use App\User;

class NormalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'isAdmin' => 0,
            'phone' => '0000000001'
        ]);
    }
}
