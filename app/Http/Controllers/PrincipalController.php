<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Subcategoria;
use App\Categoria;

class PrincipalController extends Controller
{
    
    public function index()
    {
        //$produtos = Produto::All();
       
        if(request()->sort == ('low_high')) {
            
            $produtos = Produto::orderBy('val_avista')->paginate(16);
            
        } elseif (request()->sort == ('high_low')) {
            $produtos = Produto::orderBy('val_avista', 'desc')->paginate(16);         
            
        } else {
            $produtos = Produto::orderBY('produtos.id', 'ASC')->paginate(16);
        }
        
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        return view ('site.index', compact('produtos', 'categorias', 'subcategorias'));
    }

    public function subcategoria($id)
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $produtos = Produto::where('subcategoria_id', '=', $id)->paginate(16);
        return view ('site.subcategorias', compact('produtos', 'categorias', 'subcategorias'));
    }

    public function categoria($id)
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $produtos = Produto::where('categoria_id', '=', $id)->paginate(16);
        return view ('site.categorias', compact('produtos', 'categorias', 'subcategorias'));
    }

    public function filtro(Request $request)
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();

        $nome = $request->nome;
        
        $produtos = Produto::where('nome', 'like', '%' . $nome . '%')
                            ->orderBy('nome')->paginate(16);

        return view ('site.index', compact('produtos', 'categorias', 'subcategorias'));
    }

}
