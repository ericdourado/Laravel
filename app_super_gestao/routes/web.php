<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PrincipalController::class, 'principal']);

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'], 'sobreNos');

Route::get('/contato', [ContatoController::class, 'contato'], 'contato');

Route::get('/login', function(){
    return "Login";
});



Route::get('/clientes', function(){
    return "clientes";
});
Route::get('/fornecedores', function(){
    return "fornecedores";
});
Route::get('/produtos', function(){
    return "produtos";
});