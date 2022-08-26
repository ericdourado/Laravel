<h3>fornecedor</h3>

{{-- Comentario --}}


@php
//if()
//{}else{}
@endphp

{{-- @dd($fornecedores); --}}


@isset($fornecedores)
    @forelse ($fornecedores as $valor )
        Fornecedor: {{$valor["nome"]}}
        <br>
        status: {{$valor["status"]}}
        <br>
        cnpj: {{$valor["cnpj"] ?? "Dado nao foi preenchido" }}
        <br>
        Telefone: ({{$valor["ddd"] ?? ""}}) {{$valor["telefone"] ?? ""}}
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse 
        
@endisset


    
