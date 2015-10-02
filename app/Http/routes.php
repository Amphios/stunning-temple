<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('auth/admin', ['middleware' => 'auth', 'uses' => 'AdminController@index']);

Route::post('addGems', ['middleware' => 'auth', 'uses' => 'AdminController@addGems']);
Route::post('addMoney', ['middleware' => 'auth', 'uses' => 'AdminController@addMoney']);
Route::post('addStars', ['middleware' => 'auth', 'uses' => 'AdminController@addStars']);

Route::post('convertGems', 'ProfileController@convertGems');

//Route::get('/', ['middleware' => 'auth', 'uses' => 'HomeController@index']);

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('logout', function(){
    Auth::logout();
    return redirect('home');
});

Route::get('u/{username}', 'ProfileController@index');

//Route::get('about', 'PagesController@about');
//Route::get('contact', 'PagesController@contact');
//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');
//Route::get('articles/{id}', 'ArticlesController@show');
//Route::post('articles', 'ArticlesController@store');

Route::resource('articles', 'ArticlesController');

Route::controllers ([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

