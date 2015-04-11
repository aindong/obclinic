<?php
Route::group(['namespace' => 'Aindong\Features\Queues\Controllers\Api', 'prefix' => '/api/v1/'], function() {
    Route::get('queues', 'QueuesController@index');
});