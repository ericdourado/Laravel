<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                "nome" => "Fornecedor 1",
                "status" => "N",
                "cnpj" => "00.000.000/0001-30",
                "ddd"=> "11",
                "telefone"=> "999999999"
            ],
            1 => [
                "nome" => "Fornecedor 2",
                "status" => "S",
                "cnpj" => null,
                "ddd"=> "85",
                "telefone"=> "654789321"
            ],
            2 => [
                "nome" => "Fornecedor 3",
                "status" => "S",
                "cnpj" => "00.000.000/0001-30",
                "ddd"=> "27",
                "telefone"=> "654789321"
            ]

        ];
        
        
        return view("app.fornecedor.index", compact("fornecedores"));
    }
}
