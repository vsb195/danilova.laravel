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
	Route::get('elfinder',function(){
		return view('admin/elfinder');
	});
	
	Route::get('connector','ElfinderController@connector');
	Route::post('connector','ElfinderController@connector');
	Route::get('comments','CommentsController@show');
	Route::get('comments/delete/{id}','CommentsController@delete');
	Route::get('comments/published/{id}','CommentsController@published');

});
Route::group(array('before' => 'auth'), function() {

    /*
     | Sign Out (GET)
     | --
     */
    Route::get('/account/sign-out', array(
        'as' => 'account-sign-out',
        'uses' => 'HomeController@getSignOut'
    ));

});
Route::post('/show/{id}','CommentsController@save');

Auth::routes();

Route::get('/home', 'HomeController@index');


