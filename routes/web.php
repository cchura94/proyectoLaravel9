<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect("/admin/producto");
    // return view('welcome');
});


Route::prefix("admin")->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::resource("usuario", UsuarioController::class);
    Route::resource("categoria", CategoriaController::class);
    Route::resource("producto", ProductoController::class);
    Route::resource("pedido", PedidoController::class);
    Route::resource("cliente", ClienteController::class);

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
