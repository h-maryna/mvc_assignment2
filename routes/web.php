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
/* Fo admin user ------ */




Route::middleware(['admin'])->group(function(){
	
	Route::get('posts/create', 'Posts\PostsController@create');

	Route::post('posts', 'Posts\PostsController@store');
	//Show the form
	Route::get('posts/edit/{post}', 'Posts\PostsController@edit');

	Route::put('/posts', 'Posts\PostsController@update');

	Route::delete('/posts/{post}', 'Posts\PostsController@destroy');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', 'Posts\PostsController@index');



Route::get('posts/{post}', 'Posts\PostsController@show');

Auth::routes();

Route::post('/posts/{post}', 'Posts\PostsController@storeComments');




Route::get('/home', 'HomeController@index')->name('home');


// pass down y

//
//controller for posts
//
//model Post
//
//migrate for posts table
//
//seed a few posts
//
//download blog template
//
//create blog.blade.php main layout
//
//create index.blade.php
//
// change links for css and js





