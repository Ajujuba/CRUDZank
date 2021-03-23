@extends('layout')

@section('cabecalho')
    Produtos
@endsection

@section('conteudo')
    <a href="/produtos/criar" class="btn btn-dark mb-2">Adicionar</a>

    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Id</th>
                <th scope="col">Imagem</th>
                <th scope="col">Produto</th>
                <th scope="col">Variação</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($produtos as $produto)
                <tr>
                    <td class="text-center">
                        {{ $produto->id }}
                    </td>   
                    <td class="text-center">
                        <img src="' . $produto->imagem . '"/>
                    </td>    
                    <td class="text-center">
                        {{$produto->produto}}
                    </td>   
                    <td class="text-center">
                        {{$produto->variacao}}
                    </td>
                    <td class="text-center">
                        {{$produto->categoria_id}}
                    </td>
                    <td class="text-center">
                        <a href="{{route('editar.produto', ['id'=>$produto->id])}}" class="btn btn-info"> Editar </a>
                    </td>
                    <td class="text-center">        
                        <form method="POST" action="{{route('apagar.produto', ['id'=>$produto->id])}}">
                            {{ csrf_field() }}
                            @method('delete') 
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
              </tr> 
              @endforeach
          </tbody>
    </table>
@endsection
    
    