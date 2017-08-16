<?php

Route::get('/', 'Admin\DashboardController@index');
/** Authentication **/
Route::get('/login', 'AuthController@getLogin')->name('login');
Route::post('/logout', 'AuthController@postLogout')->name('logout');
Route::group(['prefix' => 'auth'], function(){
	Route::post('login', 'AuthController@login');
	Route::post('register', 'AuthController@register');
});

/*** Administrator ***/
Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {
   Route::resource('/users', 'UserController');
   Route::resource('/permissions', 'PermissionController');
   Route::resource('/roles', 'RoleController');
});

