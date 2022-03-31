<?php

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
Route::group(['middleware'=>['auth']],function() {
    
Route::get('/books', 'BookController@index');
Route::get('/books/create','BookController@create');
Route::post('/books','BookController@store');
Route::get('/books/{book}','BookController@show');
Route::get('/books/{book}/edit','BookController@edit');
Route::put('/books/{book}','BookController@update');
Route::delete('/books/{book}','BookController@delete');

Route::get('/posts','PostController@index');
Route::get('/books/{book}/posts/create','PostController@create');
Route::post('/books/{book}/posts','PostController@store');
Route::get('/books/{book}/posts/{post}', 'PostController@show');
Route::get('/books/{book}/posts/{post}/edit','PostController@edit');
Route::put('/books/{book}/posts/{post}','PostController@update');
Route::delete('/books/{book}/posts/{post}','PostController@delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
