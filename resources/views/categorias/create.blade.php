@extends('layout')

@section('cabecalho')
   Categorias
@endsection

@section('conteudo')
    <form method="post" action="{{!isset($categoria)?route('inserir.categoria'):route('atualizar.categoria')}}">
        @csrf
        @if(isset($categoria))
            @method('PUT')
            <input type="hidden" value="{{$categoria->id}}" name='id'>
        @endif
        <div class="form-group">
            <label for="categoria">Nome da categoria</label>
            <input type="text" class="form-control" name="categoria" value="{{isset($categoria)? $categoria->nome:''}}" required>
        </div>
       
        <button class="btn btn-primary">Salvar Categoria</button>
    </form>
@endsection