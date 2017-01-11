<?php
//
Route::get('/', 'GuestController@index');
//
Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');
Route::get('auth/send-verification', 'Auth\RegisterController@sendVerification');
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
//
Route::put('books/{book}/return', [
  'middleware'=>['auth','role:member'],
  'as'        =>'member.books.return',
  'uses'      =>'BooksController@returnBack'
]);
// route middleware
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
  Route::resource('authors', 'AuthorsController');
  Route::resource('books', 'BooksController');
});
