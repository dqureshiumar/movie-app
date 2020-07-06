<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Routes for Google Auth //
Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
//End of Google Auth //

// Routes for Google Auth //
Route::get('/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
//End of Google Auth //

//Routes for Movie
Route::resource('movie','MovieController');
Route::post('imdb','HomeController@imdb_search')->name('imdb');
