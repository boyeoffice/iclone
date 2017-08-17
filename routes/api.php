<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/** Authentication **/
Route::group(['namespace' => 'Api'], function() {
	Route::post('login', 'AuthController@login');
	Route::post('register', 'AuthController@register');
	Route::post('logout', 'AuthController@logout');
});

Route::group(['namespace' => 'Api', 'middleware' => ['auth:api']], function() {
	Route::resource('post', 'PostController');
	/** User's Profile **/
   Route::get('{username}', 'AuthController@getProfile');
   /** Profile With Posts **/
   Route::get('vint/{username}', 'AuthController@getUserPost');
   /** Update Profile **/
   Route::post('update_profile', 'AuthController@update');
   Route::post('update_password', 'AuthController@update_password');
});
Route::group(['namespace' => 'Api', 'prefix' => 'js', 'middleware' => ['auth:api']], function() {
	Route::post('like', 'JsController@postLike');
	Route::post('follow', 'JsController@postFollow');
});



