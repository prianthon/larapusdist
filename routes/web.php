<?php
//
Route::get('/', 'GuestController@index');
//
Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');
Route::get('auth/send-verification', 'Auth\RegisterController@sendVerification');
// profile
Route::get('settings/profile', 'SettingsController@profile');
Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');
Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');
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
  Route::resource('members', 'MembersController');
  Route::get('statistics', [
    'as' => 'statistics.index',
    'uses' => 'StatisticsController@index'
  ]);
  Route::get('export/books', [
    'as' => 'export.books',
    'uses' => 'BooksController@export'
  ]);
  Route::post('export/books', [
    'as' => 'export.books.post',
    'uses' => 'BooksController@exportPost'
  ]);
});
