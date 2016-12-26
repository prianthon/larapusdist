<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index');

// route middleware
Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
  Route::resource('authors', 'AuthorsController');
});
