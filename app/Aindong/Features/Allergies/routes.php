<?php


Route::group(['namespace' => 'Aindong\Features\Allergies\Controllers\Api', 'prefix' => 'api/v1/maintenance'], function() {
    Route::get('allergies', 'AllergiesController@index');
    Route::post('allergies', 'AllergiesController@store');
});

Route::group(['namespace' => 'Aindong\Features\Allergies\Controllers', 'prefix' => 'maintenance'], function() {
    Route::get('allergies', 'AllergiesController@index');
});