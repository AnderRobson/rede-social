<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

//    Jeito antigo
//    /** Agrupando rotas para não repetir em todas as rotas */
//    Route::group(['namespace' => 'Form'], function ()
//    {
//        /** VERBO GET */
//        Route::get('usuarios', 'TestController@listAllUsers')->name('users.listAll');
//        Route::get('usuarios/novo', 'TestController@formAddUser')->name('users.formAddUser');
//        Route::get('usuarios/editar/{user}', 'TestController@formEditUser')->name('users.formEditUser');
//        Route::get('usuarios/{user}', 'TestController@listUser')->name('users.list');
//
//        /** VERBO POST */
//        Route::post('usuarios/store', 'TestController@storeUser')->name('users.store');
//
//        /** VERBO PUT/PATCH */
//        Route::put('usuarios/edit/{user}', 'TestController@edit')->name('users.edit');
//
//        /** VERBO DELETE */
//        Route::delete('usuarios/destroy/{user}', 'TestController@destroy')->name('users.destroy');
//    });

    /**Jeito novo */
    Route::resource('redesocial/publicacao', 'PostsController')->names('publicacoes')->parameters(['redesocial' => 'publicacoes']);
    Route::resource('redesocial/amizade', 'AmizadesController')->names('amizades')->parameters(['redesocial' => 'amizades']);
    Route::put('redesocial/amizade/{amizade}', 'AmizadesController@solicitacao')->name('amizades.solicitacao');
    Route::post('redesocial/usuarios', 'UsuariosController@login')->name('user.login');
    Route::get('redesocial/usuarios', 'UsuariosController@users')->name('user.usuarios');
    Route::get('redesocial/feed', 'UsuariosController@feed')->name('user.feed');
    Route::get('redesocial/logout', 'UsuariosController@logout')->name('user.logout');
    Route::resource('redesocial', 'UsuariosController')->names('user')->parameters(['redesocial' => 'usuarios']);


