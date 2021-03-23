<?php 

namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos=Produto::all(['id','produto','variacao', 'imagem', 'categoria_id']);
        return view('produtos.index', ['produtos'=>$produtos]);

    }

    public function create()
    {
        $categorias=Categoria::all(['id','nome']);
      
        return view('produtos.create', ['categorias'=>$categorias]);
    }

    public function store(Request $request)
    {
        //var_dump($request);

       // Manipular upload de arquivo
        if($request->imagem){
             // Obtenha o nome do arquivo com a extensão
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            /// Pega apenas o nome do arquivo
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             // Obtenha apenas ext
            $extension = $request->file('imagem')->getClientOriginalExtension();
            // Nome do arquivo para armazenar
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Imagem
            $path = $request->file('imagem')->storeAs('public/imagens', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        $produtos = new Produto();
        $produtos->produto=$request->produto;
        $produtos->variacao=$request->variacao;
        $produtos->imagem=$fileNameToStore;
        $produtos->categoria_id=$request->categoria_id;
        $produtos->save();

        return redirect()->route('produtos');
    }

    public function edit($id)
    {
        $categorias= Categoria::all(['id','nome']);
        $produto=Produto::find($id);
        return view('produtos.create', ['produto'=>$produto], ['categorias'=>$categorias],);
    }

    public function update(Request $request, Produto $produto)
    {
        $produto=Produto::find($request->id);
        $produto->produto=$request->produto;
        $produto->variacao=$request->variacao;
        $produto->imagem=$request->imagem;
        $produto->categoria_id=$request->categoria_id;
        $produto->save();
        return redirect()->route('produtos');

    }

    public function destroy($id)
    {
        $produto=Produto::find($id);
        $produto->delete();
         return redirect()->route('produtos');
    }
}