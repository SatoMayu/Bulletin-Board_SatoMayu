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
Route::namespace('User')->group(function(){
  Route::namespace('Post')->group(function(){
    Route::get('/top','PostsController@show')->name('top.show');
    Route::get('/post/create','PostsController@postCreate')->name('post.create');
  });
});

// Route::get('/top', function () {
//     return view('welcome');
// });
