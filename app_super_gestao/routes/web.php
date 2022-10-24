<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PrincipalController::class, 'principal'])->name("site.index")->middleware('log.acesso');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name("site.sobrenos");
Route::get('/contato', [ContatoController::class, 'contato'])->name("site.contato");
Route::post('/contato', [ContatoController::class, 'salvar'])->name("site.contato");
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name("site.login");
Route::post('/login', [LoginController::class, 'autenticar'])->name("site.login");


Route::middleware('autenticacao:padrao,visitante')->prefix("/app")->group(function () {
    Route::get('/clientes', function () {
        return "clientes";
    })->name("app.clientes");
    Route::get('/fornecedores', [FornecedorController::class, "index"])->name("app.fornecedores");
    Route::get('/produtos', function () {
        return "produtos";
    })->name("app.produtos");
});
