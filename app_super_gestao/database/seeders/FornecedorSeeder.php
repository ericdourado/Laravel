<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSERINDO COM INSTANCIA DE OBJETO
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'ES';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        //INSERINDO COM MÉTODO STATIC SEM INSTANCIA COM A PERMISSAO DO FILLABLE
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'MG',
            'email' => 'contato@fornecedor200.com.br'
        ]);

    }
}
