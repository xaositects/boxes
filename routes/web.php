<?php

\Route::get('/', 'IndexController@index');
\Route::any('logout', 'SessionsController@kill');
\Route::get('home', 'HomeController@index');
\Route::get('profile', 'UserProfileController@index');
\Route::get('register', 'RegistrationController@create');
\Route::post('register', 'RegistrationController@store');
\Route::get('login', 'SessionsController@create');
\Route::post('login', 'SessionsController@store');
\Route::get('create-profile', 'UserProfileController@create');
\Route::post('create-profile', ['uses' => 'UserProfileController@store', 'act' => 'create']);
\Route::get('update-profile', 'UserProfileController@update');
\Route::get('switch-profile/{id}', ['uses' => 'UserProfileController@switchProfile']);
\Route::post('update-profile', ['uses' => 'UserProfileController@store', 'act' => 'update']);
