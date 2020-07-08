<?php

use Illuminate\Support\Facades\Route;

//Movies
Route::get('/',"MoviesController@index")->name("movies.index");
Route::get('/movies/{movie}',"MoviesController@show")->name("movies.show");

//tvshow
Route::get('/tv',"TvController@index")->name("tv.index");
Route::get('/tv/{id}',"TvController@show")->name("tv.show");

//Actor
Route::get('/actors',"ActorsController@index")->name("actors.index");
Route::get('/actors/page/{page?}',"ActorsController@index");
Route::get('/actors/{id}',"ActorsController@show")->name("actors.show");

