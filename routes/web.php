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
    Route::get('/top/{keyword?}','PostsController@show')->name('top.show');
    Route::get('/post/detail/{id}','PostsController@postDetail')->name('post.detail');
    Route::get('/post/input','PostsController@postInput')->name('post.input');
    Route::post('/post/create','PostsController@postCreate')->name('post.create');
    Route::get('/category/input','PostsController@categoryInput')->name('category.input');
    Route::post('main_category/create','PostsController@mainCategoryCreate')->name('main.category.create');
    Route::post('sub_category/create','PostsController@subCategoryCreate')->name('sub.category.create');
  });
});

Route::namespace('Auth')->group(function(){
  Route::namespace('Login')->group(function(){
    Route::get('/login','LoginController@loginView')->name('loginView');
    Route::post('login/post','LoginController@loginPost')->name('loginPost');
    Route::get('/logout', 'LoginController@logout');
  });
  Route::namespace('Register')->group(function(){
    Route::get('register','RegisterController@registerView')->name('registerView');
    Route::post('register/post','RegisterController@registerPost')->name('registerPost');
    Route::get('added','RegisterController@added')->name('added');
  });
});

// Route::get('/top', function () {
//     return view('welcome');
// });
