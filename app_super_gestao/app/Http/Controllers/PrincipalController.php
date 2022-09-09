<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;


class PrincipalController extends Controller
{
    public function principal()
    {
        $motivo_contatos = MotivoContato::all();
        return view("site.Principal", ['motivo_contatos' => $motivo_contatos]);
    }
}
