<?php

Route::group(['namespace' => 'Aindong\Features\Diseases\Controllers', 'prefix' => 'maintenance'], function() {
    Route::get('diseases', 'DiseasesController@index');
});

Route::group(['namespace' => 'Aindong\Features\Diseases\Controllers\Api', 'prefix' => 'api/v1/maintenance'], function() {
    Route::get('diseases', 'DiseasesController@index');
});