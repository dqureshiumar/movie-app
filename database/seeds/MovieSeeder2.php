<?php

use Illuminate\Database\Seeder;

class MovieSeeder2 extends Seeder
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
            'movie_name' => 'Avengers-2012',
            'movie_description' => "Marvel's The Avengers (classified under the name Marvel Avengers Assemble in the United Kingdom and Ireland), or simply The Avengers, is a 2012 American superhero film based on the Marvel Comics superhero team of the same name.",
            'movie_poster' => 'default.jpg'
        ]);
    }
}
