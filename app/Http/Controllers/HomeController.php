<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Movie::all();
        return view('home')->with('movies',$movies);
    }

    public function imdb_search(Request $request)
    {

        $mid = $request->input('imdb_id');
        $movie_id = ltrim($mid,'0');
        $movie_id = (int)$movie_id;
        $pic = 'default.jpg';
        try{
            $title = new \Imdb\Title($movie_id);
            $movie = new Movie;
            $movie->movie_name = $title->title();
            $movie->user_id = auth()->user()->id;
            $movie->movie_description = $title->plotoutline();
            $movie->movie_poster = $pic;
            $movie->isIMDB = 'yes';
            $movie->save();
            return redirect('/home')->with('success', 'Movie Added');

        }
        catch (\Exception $e){
            return redirect('/home')->with('error', 'Invalid Movie ID');
        }
        
    }
}
