<?php

Route::group(['prefix' => 'client'], function(){
    Route::post('/', ['middleware' => 'createClient', 'as' => 'create', 'uses' => 'ClientController@create']);
});
