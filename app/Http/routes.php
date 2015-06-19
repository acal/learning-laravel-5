<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('articles', 'ArticlesController@index');
Route::get('articles/create', 'ArticlesController@create'); //this one needs to be placed above articles/{id} or the wild card will override this route
Route::get('articles/{id}', 'ArticlesController@show'); //for show single article using id wild card
Route::post('articles', 'ArticlesController@store');
