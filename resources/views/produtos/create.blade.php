@extends('layout')

@section('cabecalho')
    Produtos
@endsection

@section('conteudo')
    <form action="{{!isset($produto)?route('inserir.produto'):route('atualizar.produto')}}" method="POST">
        @csrf
        @if(isset($produto))
            @method('PUT')
            <input type="hidden" value="{{$produto->id}}" name='id'>
        @endif
        <div class="form-group">
            <label for="produto">Nome do produto</label>
            <input type="text" class="form-control" name="produto" value="{{isset($produto)? $produto->produto : ''}}">
        </div>
        <div class="form-group">
            <label for="variacao">Produto tem variação?</label>
            <select name="variacao" class="form-control">
                <?php if(isset($produto)): ?>
                    <option value="{{ $produto->variacao}}">{{ $produto->variacao}}</option>
                <?php else: ?>  
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                <?php endif ?>
            </select>
        </div>
        <div class="form-group">
            <label for="imagem">Escolha a imagem do produto</label>
            <input type="file" class="form-control" name="imagem" value="{{isset($produto)? $produto->imagem : ""}}">
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoria do Produto</label>
            <select name="categoria_id" class="form-control">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Salvar Produto</button>
    </form>
@endsection