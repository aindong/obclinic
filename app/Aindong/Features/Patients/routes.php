<?php

/**
 * Views Controllers
 */
Route::group(['namespace' => 'Aindong\Features\Patients\Controllers'], function() {
    Route::get('/patients', 'PatientsController@index');
});

/**
 * Api Controllers
 */
Route::group(['namespace' => 'Aindong\Features\Patients\Controllers\Api', 'prefix' => '/api/v1/'], function() {
    Route::get('/patients', 'PatientsController@index');
    Route::post('/patients', 'PatientsController@store');
});
