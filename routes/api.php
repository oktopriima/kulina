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

Route::group(['prefix' => 'user-review', 'middleware' => 'verifyjson'], function(){
	Route::get('all', 'UserReviewController@index');
	Route::post('store', 'UserReviewController@store');
	Route::get('show/{id}', 'UserReviewController@show');
	Route::put('update/{id}', 'UserReviewController@update');
	Route::delete('destroy/{id}', 'UserReviewController@destroy');
});