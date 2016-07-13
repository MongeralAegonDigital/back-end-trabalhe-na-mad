<?php

Route::group(['prefix' => 'client'], function(){
    Route::post('/', ['as' => 'create', 'uses' => 'ClientController@create']);
});
