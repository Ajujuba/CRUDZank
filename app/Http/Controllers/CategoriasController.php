<?php 

namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all(['id','nome']);
        //var_dump($categoria);
        return view('categorias.index', ['categorias'=>$categorias]);
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nome=$request->categoria;
        //var_dump($request);
        $categoria->save();

        return redirect()->route('categorias');
    }

    public function edit($id)
    {
        $categoria=Categoria::find($id);
        return view('categorias.create', ['categoria'=>$categoria]);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria=Categoria::find($request->id);
        $categoria->nome=$request->categoria;
        $categoria->save();
        return redirect()->route('categorias');
    }

    public function destroy($id)
    {
        $categoria=Categoria::find($id);
        $categoria->delete();
         return redirect()->route('categorias');
    }
}