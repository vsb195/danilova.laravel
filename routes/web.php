<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','FrontController@index');
Route::get('/show/{id}','FrontController@show');

Route::group(['prefix'=>'adminzone'], function()
{
    Route::get('/', function()
    {
        return view('admin/dashboard');
    });
	Route::resource('articles','ArticlesController');
	Route::resource('pages','PagesController');
	Route::resource('categories','CategoriesController');
});


