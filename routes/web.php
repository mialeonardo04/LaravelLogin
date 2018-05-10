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
	//tanpa login
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
    Route::post('/register',[
        'uses' => 'UserController@postSignUp',
        'as' => 'register'
    ]);
    Route::post('/login',[
        'uses' => 'UserController@postSignIn',
        'as' => 'login'
    ]);
    Route::get('/logout',[
        'uses' => 'UserController@logout',
        'as' => 'logout'
    ]);

    //harus login

	Route::get('/dashboard',[
		'uses' => 'UserController@getDashboard',
		'as' => 'dashboard',
        'middleware' => 'auth'
	]);
    Route::get('/admin', [
        'uses' => 'UserController@getAdminPage',
        'as' => 'admin',
        'middleware' => ['auth','roles'],
        'roles' => ['admin']
    ]);
    Route::get('/printallstudent',[
        'uses' => 'StudentController@cetakStudent',
        'as' => 'printallstudent',
        'middleware' => 'auth'
    ]);
    Route::get('/students/printbyid/{id}',[
        'uses' => 'StudentController@cetakById',
        'as' => 'students.printbyid',
        'middleware' => 'auth'
    ]);
    //end of GET method

    Route::post('/admin/assign-roles', [
        'uses' => 'UserController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => ['auth','roles'],
        'roles' => ['admin']
    ]);

    Route::group(['middleware' => ['auth']],function (){
        Route::resource('/students','StudentController');
        Route::group(['middleware' => ['roles'],'roles' => ['admin']],function (){
            Route::resource('/teachers','TeacherController');
            Route::resource('/payments','PaymentController');
        });
    });
    //end of post put delete method
});