<?php
//
Route::get('/', 'GuestController@index');
//
Auth::routes();
//
Route::get('/home', 'HomeController@index');
//
Route::get('books/{book}/borrow', [
  'middleware'=>['auth','role:member'],
  'as'        =>'guest.books.borrow',
  'uses'      =>'BooksController@borrow'
]);
// route middleware
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
  Route::resource('authors', 'AuthorsController');
  Route::resource('books', 'BooksController');
});
