<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;



class ContatoController extends Controller
{
    public function contato(Request $request)
    { 
        $motivo_contatos = MotivoContato::all();
        return view("site.contato", ['motivo_contatos' => $motivo_contatos]);
    }
    public function salvar(Request $request){
        // SiteContato::create($request->all());
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required'
        ]);
        
    }
}
