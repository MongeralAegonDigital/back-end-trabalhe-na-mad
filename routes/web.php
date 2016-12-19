<?php

Route::get('/', 'Portal\PortalController@index');

#########x############################################3
Auth::routes();

Route::get('/logout', [
    'as'    => 'logout',
    'uses'  => 'Auth\LoginController@logout'
]);
Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => 'auth'
], function() {
    ## PAGINA INICIAL
    Route::get('/', [
        'as'    => 'home',
        'uses'  => 'Admin\DashboardController@index'
    ]);

    //## CATEGORIA
    Route::resource('categoria', 'Admin\CategoriaController');//usuarios



    //## PRODUTOS
    Route::resource('produtos', 'Admin\ProdutosController');//usuarios
    Route::get('/api', 'Admin\ProdutosApi@list');//usuarios

    //## USUARIOS
    Route::resource('usuarios', 'Admin\UsuarioController',[
        'names' =>[
            'index'     => 'users.index',
            'create'    => 'users.create',
            'store'     => 'users.store',
            'show'      => 'users.show',
            'edit'      => 'users.edit',
            'update'    => 'users.update',
            'destroy'   => 'users.destroy',
        ]
    ]);//usuarios


});
