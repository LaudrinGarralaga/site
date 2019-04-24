<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Subcategoria;
use App\Categoria;

class SubcategoriaController extends Controller
{
    
    public function index()
    {
        // Verifica se  está logado
        if (!Auth::check()) {
            return redirect('/');
        }
        // Recupera todas as categorias do banco
        $subcategorias = Subcategoria::All();
        return view('subcategoria_list', compact('subcategorias'));
    }

    
    public function create()
    {
        // Verifica se  está logado
        if (!Auth::check()) {
            return redirect('/');
        }

        $categorias = Categoria::orderBy('nome')->get();
        
        return view('subcategoria_form', compact('categorias'));
    }

    
    public function store(Request $request)
    {
        // Obtém os dados do formulário
        $dados = $request->all();
        // Realiza a inclusão
        $inc = Subcategoria::create($dados);
        // Exibe uma mensagem de sucesso se gravou os dados no bando senão exibe uma de erro
        if ($inc) {
            return redirect()->route('subcategorias.index')
                ->with('success', $request->tipo . ' Castrado(a) com sucesso!');
        } else {
            return redirect()->back->with('error', 'Falha ao cadastrar!');
        }
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        // Verifica se está logado
        if (!Auth::check()) {
            return redirect('/');
        }
        // Posiciona no registo a ser alterado
        $reg = Subcategoria::find($id);

        $categorias = Categoria::orderBy('nome')->get();

        return view('subcategoria_form_edit', compact('reg', 'categorias'));
    }

    
    public function update(Request $request, $id)
    {
        // Obtém os dados do formulario
        $dados = $request->all();
        // Posiciona no registo a ser alterado
        $reg = Subcategoria::find($id);
        // Realiza a alteração
        $alt = $reg->update($dados);
        // Exibe uma mensagem de sucesso se alterou os dados no bando senão exibe uma de erro
        if ($alt) {
            return redirect()->route('subcategorias.index')
                ->with('alter', $request->nome . ' Alterado(a) com sucesso!');
        } else {
            return redirect()->back->with('error', 'Falha ao alterar!');
        }
    }

    
    public function destroy($id)
    {
        // Posiciona no registo a ser alterado
        $subcat = Categoria::find($id);
        // Exibe uma mensagem se excluiu com sucesso dados, senão exibe uma de erro
        if ($subcat->delete()) {
            return redirect()->route('subcategorias.index')
                ->with('trash', $subcat->nome . ' Excluído(a) com sucesso!');
        } else {
            return redirect()->back->with('error', 'Falha ao excluir!');
        }
    }
}
