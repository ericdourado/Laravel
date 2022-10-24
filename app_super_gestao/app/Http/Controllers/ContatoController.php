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
        
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'
        ],
        [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute precisa ter no mínimo 3 caracteres',
            'max' => 'O campo :attribute deve ter no máximo 40 caracteres',
            'email' => 'Deve :attribute ser um e-mail válido',
        ]
        
    );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
