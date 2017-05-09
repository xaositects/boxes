<?php

\Route::get('/', 'IndexController@index');
\Route::any('/logout', 'SessionsController@kill');
\Route::get('/home', 'HomeController@index');
\Route::get('/site-admin', 'SiteAdminController@index');


\Route::group(['prefix' => 'site-admin','middleware' => ['auth', 'admin']], function () {
    \Route::get('/profile-types', 'UserProfileTypeController@index')->name('profile-types');
    \Route::get('/profile-types/create', 'UserProfileTypeController@create')->name('profile-types/create');
    \Route::post('/profile-types/create', 'UserProfileTypeController@store')->name('profile-types/create');
    \Route::post('/profile-types/delete/{id}', 'UserProfileTypeController@destroy')->name('profile-types/delete');
    \Route::get('/profile-types/update/{id}', 'UserProfileTypeController@edit')->name('profile-types/update');
    \Route::post('/profile-types/update/{id}', 'UserProfileTypeController@update')->name('profile-types/update');
});

\Route::get('/profile', 'UserProfileController@index');
\Route::get('/register', 'RegistrationController@create');
\Route::post('/register', 'RegistrationController@store');
\Route::get('/login', 'SessionsController@create');
\Route::post('/login', 'SessionsController@store');
\Route::get('/create-profile', 'UserProfileController@create');
\Route::post('/create-profile', ['uses' => 'UserProfileController@store', 'act' => 'create']);
\Route::get('/update-profile', 'UserProfileController@update');
\Route::get('/switch-profile/{id}', ['uses' => 'UserProfileController@switchProfile']);
\Route::post('/update-profile', ['uses' => 'UserProfileController@store', 'act' => 'update']);
