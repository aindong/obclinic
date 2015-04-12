<?php

Route::group(['namespace' => 'Aindong\Features\Medicines\Controllers', 'prefix' => 'maintenance'], function() {
    Route::get('medicines', 'MedicinesController@index');
});

Route::group(['namespace' => 'Aindong\Features\Medicines\Controllers\Api', 'prefix' => 'api/v1/maintenance'], function() {
    Route::get('medicines', 'MedicinesController@index');
});