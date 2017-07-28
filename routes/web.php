<?php

Route::get('/', function () {
		return view('welcome');
});
/** Authentication **/
Route::get('/login', 'AuthController@getLogin')->name('login');
Route::post('/logout', 'AuthController@postLogout')->name('logout');
Route::group(['prefix' => 'auth'], function(){
	Route::post('login', 'AuthController@login');
	Route::post('register', 'AuthController@register');
});
Route::resource('post', 'PostController');
Route::get('timeline/{username}', 'UserController@show');
Route::group(['prefix' => 'user/{username}', 'middleware' => ['auth']], function() {
	Route::get('{path?}', 'HomeController@getProfile')->where('path', '[\/\w\.-]*');
});


/*** Administrator ***/
Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
   Route::get('/', 'DashboardController@index');
   Route::resource('/users', 'UserController');
   Route::resource('/permissions', 'PermissionController');
   Route::resource('/roles', 'RoleController');
});




Route::get('/home', 'HomeController@index')->name('home');
