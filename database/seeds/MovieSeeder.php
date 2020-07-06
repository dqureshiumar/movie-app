<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::create([
            'user_id' => 1,
            'movie_name' => 'Dil Bechara',
            'movie_description' => 'Based on the bestselling novel “The Fault in Our Stars” by author John Green.It stars Sushant Singh Rajput, Saif Ali Khan and debutante Sanjana Sanghi, and was initially titled Kizie Aur Manny.Filming commenced on 9 July 2018 in Jamshedpur.',
            'movie_poster' => 'default.jpg'
        ]);
    }
}
