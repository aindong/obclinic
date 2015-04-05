<?php

Route::group(['namespace' => 'Aindong\Features\Medias\Controllers'], function() {
    Route::post('/media', 'MediasController@store');
});