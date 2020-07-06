<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\User;
use Illuminate\Support\Facades\Storage;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->isAdmin ==1 ){
            return view('movies.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->isAdmin != 1){
            if($request->hasFile('movie_poster'))
            {
                // Get filename with the extension
                // Get filename with the extension
                $filenameWithExt = $request->file('movie_poster')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('movie_poster')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('movie_poster')->storeAs('public/movie_poster', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'default.jpg';
            }

            $movie = new Movie;
            $movie->movie_name = $request->input('movie_name');
            $movie->user_id = auth()->user()->id;
            $movie->movie_description = $request->input('movie_description');
            $movie->movie_poster = $fileNameToStore;
            $movie->save();
            return redirect('/home')->with('success', 'Movie Added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movies.view')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        
        //Check if movie exists before deleting
        if (!isset($movie)){
            return redirect('/home')->with('error', 'No movie Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$movie->user_id or auth()->user()->isAdmin != 1){
            return redirect('/home')->with('error', 'Unauthorized Page');
        }

        return view('movies.edit')->with('movie', $movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->isAdmin == 1){   
            $movie = Movie::find($id);
            if($request->hasFile('movie_poster'))
            {
                // Get filename with the extension
                // Get filename with the extension
                $filenameWithExt = $request->file('movie_poster')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('movie_poster')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('movie_poster')->storeAs('public/movie_poster', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'default.jpg';
            }

            $movie->movie_name = $request->input('movie_name');
            $movie->movie_description = $request->input('movie_description');
            if($request->hasFile('movie_poster')){
                if($movie->movie_poster != 'default.jpg'){
                    Storage::delete('public/movie_poster/'.$movie->movie_poster);
                }
                $movie->movie_poster = $fileNameToStore;
            }
            $movie->save();

            return redirect('/home')->with('success', 'Movie Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        
        //Check if post exists before deleting
        if (!isset($movie)){
            return redirect('/Movie')->with('error', 'No Movie');
        }

        // Check for correct user
        if(auth()->user()->id !==$movie->user_id or auth()->user()->isAdmin != 1){
            return redirect('/home')->with('error', 'Unauthorized Page');
        }

        if($movie->movie_poster != 'default.jpg'){
            // Delete Image
            Storage::delete('public/movie_poster/'.$movie->movie_poster);
        }
        
        $movie->delete();
        return redirect('/home')->with('success', 'Movie Removed');
    }
}
