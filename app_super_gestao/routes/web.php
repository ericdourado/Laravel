<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PrincipalController::class, 'principal'])->name("site.index");
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name("site.sobrenos");
Route::get('/contato', [ContatoController::class, 'contato'])->name("site.contato");
Route::post('/contato', [ContatoController::class, 'contato'])->name("site.contato");
Route::get('/teste', function(){
    $teste = "";
    if(isset($teste)){
        if(empty($teste)){
            return "existe, está vazia";
        }
        return "existe";
    }return "nao existe";
});

Route::get('/login', function(){
    return "Login";
})->name("site.login");

Route::prefix("/app")->group(function(){
    Route::get('/clientes', function(){
        return "clientes";
    })->name("app.clientes");
    Route::get('/fornecedores', [FornecedorController::class,"index"])->name("app.fornecedores");
    Route::get('/produtos', function(){
        return "produtos";
    })->name("app.produtos");
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name("site.teste");

Route::fallback(function(){
    echo "A rota acessada não existe.
    <a href='". route('site.index'). "'>clique aqui</a> para ir para a página inicial";
});

