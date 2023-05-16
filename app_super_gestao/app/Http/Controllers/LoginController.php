<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha inválido';
        }
        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para acessar a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }
    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'required',
            'senha' => 'required'
        ];
        $feedback = [
            'required' => 'Este campo é obrigatório'
        ];

        $request->validate($regras, $feedback);
        $email = $request->post('usuario');
        $password = $request->post('senha');
        $user = new User();

        $usuario = $user->where('email', $email)->get()->first();
        // dd(['senha_do_banco' => $usuario->password, 'senha_recebida'=> Hash::check($password,$usuario->password)],);

        if (isset($usuario->name) and Hash::check($password,$usuario->password)) {
            session_start();
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.cliente');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
