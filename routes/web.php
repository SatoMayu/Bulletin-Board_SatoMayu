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
    Route::get('/post/createForm','PostsController@post_createForm')->name('post.create.form');
    Route::post('/post/create','PostsController@postCreate')->name('post.create');
  });
});

Route::namespace('Auth')->group(function(){
  Route::namespace('Login')->group(function(){
    Route::get('/login','LoginController@loginView')->name('loginView');
    Route::post('login/post','LoginController@loginPost')->name('loginPost');
    // Route::get('/logout', 'LoginController@logout');
  });
  Route::namespace('Register')->group(function(){
    Route::get('register','RegisterController@registerView')->name('registerView');
  });
});

// Route::get('/top', function () {
//     return view('welcome');
// });
