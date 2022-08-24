<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::resource("usuario", UsuarioController::class);

});
/*
    [GET      /usuario          -  UsuarioController   index]   usuario.index
    [GET      /usuario/create   -  UsuarioController   create]  usuario.create
    [POST     /usuario          -  UsuarioController   store]   usuario.store
    [GET      /usuario/{id}     -  UsuarioController   show]    usuario.show
    [GET      /usuario/{id}/edit-  UsuarioController   edit]    usuario.edit
    [PUT      /usuario/{id}     -  UsuarioController   update]  usuario.update
    [DELETE   /usuario/{id}     -  UsuarioController   destroy] usuario.destroy

*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});
