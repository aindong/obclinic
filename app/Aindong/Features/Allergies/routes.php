<?php

Route::group(['namespace' => 'Aindong\Features\Allergies\Controllers', 'prefix' => 'maintenance'], function() {
    Route::get('allergies', 'AllergiesController@index');
});

Route::group(['namespace' => 'Aindong\Features\Allergies\Controllers\Api', 'prefix' => 'api/v1/maintenance'], function() {
    Route::get('allergies', 'AllergiesController@index');
});