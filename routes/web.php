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

Route::group(['middleware' => ['web']],function(){
	Route::get('/', function () {
	    return view('welcome');
	})->name('home');
	Route::get('/login',[
	    'uses' => 'UserController@getLogin',
        'as' => 'login'
    ]);
    Route::get('/register',[
        'uses' => 'UserController@getRegister',
        'as' => 'register'
    ]);
	Route::get('/dashboard',[
		'uses' => 'UserController@getDashboard',
		'as' => 'dashboard',
        'middleware' => 'auth'
	]);
	Route::get('/logout',[
	    'uses' => 'UserController@logout',
        'as' => 'logout'
    ]);
	///////////get///////////////////////
	Route::post('/register',[
		'uses' => 'UserController@postSignUp',
		'as' => 'register'
	]);
	Route::post('/login',[
		'uses' => 'UserController@postSignIn',
		'as' => 'login'
	]);
	//////////post/////////////////////
});