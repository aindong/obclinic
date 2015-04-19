<?php

Route::group(['namespace' => 'Aindong\Features\Appointments\Controllers'], function() {
    Route::get('appointments', 'AppointmentsController@index');
});

Route::group(['namespace' => 'Aindong\Features\Appointments\Controllers\Api',
    'prefix' => '/api/v1/'], function() {

    Route::get('appointments', 'AppointmentsController@index');
    Route::post('appointments', 'AppointmentsController@store');

});