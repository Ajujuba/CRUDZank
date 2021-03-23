@extends('layout')

@section('cabecalho')
    Categorias
@endsection

@section('conteudo')
    <a href="/categorias/criar" class="btn btn-dark mb-2">Adicionar</a>

    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Id</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($categorias as $categoria)
                <tr>
                    <td class="text-center">
                        {{ $categoria->id }}
                    </td>  
                    <td class="text-center">
                        {{ $categoria->nome }}
                    </td>   
                    <td class="text-center">
                        <a href="{{route('editar.categoria', ['id'=>$categoria->id])}}" class="btn btn-info"> Editar </a>
                    </td>
                    <td class="text-center">    
                        <form method="POST" action="{{route('apagar.categoria', ['id'=>$categoria->id])}}">
                            {{ csrf_field() }}
                            @method('delete') 
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr> 
                @endforeach
    </ul>
@endsection
    