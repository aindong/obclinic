<?php

Route::group(['namespace' => 'Aindong\Features\Users\Controllers\Api', 'prefix' => 'api/v1/maintenance'], function() {
    Route::get('users', 'UsersController@index');
    Route::post('users', 'UsersController@store');
});

Route::group(['namespace' => 'Aindong\Features\Users\Controllers', 'prefix' => 'maintenance'], function() {
    Route::get('users', 'UsersController@index');
});