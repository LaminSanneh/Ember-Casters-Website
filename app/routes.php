<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('namespace' => 'EmberCasters\Modules\PublicArea\Controllers'), function(){
    Route::get('/', array('as' => 'home', 'uses' => 'PublicController@home'));
    Route::get('/login', array('as' => 'showLoginForm', 'uses' => 'AuthController@showLoginForm'));
    Route::post('/login', array('as' => 'login', 'uses' => 'AuthController@login'));
    Route::get('/logout', array('as' => 'logout', 'uses' => 'AuthController@logout'));
    Route::get('/lessons/{id}/{title}', array('as' => 'viewLesson', 'uses' => 'PublicController@viewLesson'));
});

Route::group(array('namespace' => 'EmberCasters\Modules\Admin\Controllers', 'prefix' => 'admin', 'before' => 'super-user'), function(){
    Route::resource('lessons', 'LessonsController');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::get('users/{id}/addToRole/{role_id}',
            array('as' => 'admin.users.addToRole', 'uses' => 'UsersController@addToRole'));
    Route::get('users/{id}/removeFromRole/{role_id}',
            array('as' => 'admin.users.removeFromRole', 'uses' => 'UsersController@removeFromRole'));
});



