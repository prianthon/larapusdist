<?php
Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
// route middleware
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
  Route::resource('authors', 'AuthorsController');
  Route::resource('books', 'BooksController');
});
