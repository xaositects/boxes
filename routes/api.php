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
\Route::group(['prefix' => 'v1','middleware' => ['auth:api']], function () {
    \Route::get('/profile-types', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}], 'UserProfileTypeController@index')->name('profile-types');
    \Route::get('/profile-types/create', 'UserProfileTypeController@create')->name('profile-types/create');
    \Route::post('/profile-types/create', 'UserProfileTypeController@store')->name('profile-types/create');
    \Route::post('/profile-types/delete/{id}', 'UserProfileTypeController@destroy')->name('profile-types/delete');
    \Route::get('/profile-types/update/{id}', 'UserProfileTypeController@edit')->name('profile-types/update');
    \Route::post('/profile-types/update/{id}', 'UserProfileTypeController@update')->name('profile-types/update');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
