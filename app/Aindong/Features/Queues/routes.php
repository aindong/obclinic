<?php

Route::group(['namespace' => 'Aindong\Features\Queues\Controllers'], function() {
    Route::get('/', 'QueuesController@index');
});

Route::group(['namespace' => 'Aindong\Features\Queues\Controllers\Api', 'prefix' => '/api/v1/'], function() {
    Route::get('queues', 'QueuesController@index');
    Route::post('queues', 'QueuesController@store');
});