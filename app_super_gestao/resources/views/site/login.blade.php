@extends('site.layouts.basico');
@section("titulo", $titulo)
@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>

    <div class="informacao-pagina">
        <form action={{route('site.login')}} method='post'>
            @csrf
            <input name='usuario' value="{{old('usuario') }}" type='text' placeholder='Usuário' class='borda-preta'>
            {{$errors->has('usuario') ? $errors->first('usuario') : '' }}
            <input name='senha' value="{{old('usuario') }}" type='password' placeholder='Password' class='borda-preta'>
            {{$errors->has('senha') ? $errors->first('senha') : ''}}
            <button type='submit' class='borda-preta'>Acessar</button>
        </form>
        {{ isset($erro) && $erro != '' ? $erro : '' }}
    </div>  
</div>

<div class="rodape">
    <div class="redes-sociais">
        <h2>Redes sociais</h2>
        <img src="{{asset('img/facebook.png')}}">
        <img src="{{asset('img/linkedin.png')}}">
        <img src="{{asset('img/youtube.png')}}">
    </div>
    <div class="area-contato">
        <h2>Contato</h2>
        <span>(27) 99694-8351</span>
        <br>
        <span>ericdourado@hotmail.com</span>
    </div>
    <div class="localizacao">
        <h2>Localização</h2>
        <img src="{{asset('img/mapa.png')}}">
    </div>
</div>
@endsection
