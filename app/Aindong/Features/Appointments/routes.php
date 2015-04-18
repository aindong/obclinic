<?php

Route::group(['namespace' => 'Aindong\Features\Appointments\Controllers'], function() {
    Route::get('/appointments', 'AppointmentsController@index');
});

Route::group(['namespace' => 'Aindong\Features\Appointments\Controllers\Api'], function() {

});