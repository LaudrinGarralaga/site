<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Categoria;

class CategoriaController extends Controller
{
    
    public function index()
    {
        // Verifica se  está logado
        if (!Auth::check()) {
            return redirect('/');
        }
        // Recupera todas as categorias do banco
        $categorias = Categoria::All();

        return view('categoria.categoria_list', compact('categorias'));
    }

    
    public function create()
    {
        // Verifica se  está logado
        if (!Auth::check()) {
            return redirect('/');
        }
       
        return view('categoria.categoria_form');
    }

    
    public function store(Request $request)
    {
        // Obtém os dados do formulário
        $dados = $request->all();
        // Realiza a inclusão
        $inc = Categoria::create($dados);
        // Exibe uma mensagem de sucesso se gravou os dados no bando senão exibe uma de erro
        if ($inc) {
            return redirect()->route('categorias.index')
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
        $reg = Categoria::find($id);

        return view('categoria.categoria_form_edit', compact('reg'));
    }

    
    public function update(Request $request, $id)
    {
        // Obtém os dados do formulario
        $dados = $request->all();
        // Posiciona no registo a ser alterado
        $reg = Categoria::find($id);
        // Realiza a alteração
        $alt = $reg->update($dados);
        // Exibe uma mensagem de sucesso se alterou os dados no bando senão exibe uma de erro
        if ($alt) {
            return redirect()->route('categorias.index')
                ->with('alter', $request->nome . ' Alterado(a) com sucesso!');
        } else {
            return redirect()->back->with('error', 'Falha ao alterar!');
        }
    }

    
    public function destroy($id)
    {
        // Posiciona no registo a ser alterado
        $cat = Categoria::find($id);
        // Exibe uma mensagem se excluiu com sucesso dados, senão exibe uma de erro
        if ($cat->delete()) {
            return redirect()->route('categorias.index')
                ->with('trash', $cat->nome . ' Excluído(a) com sucesso!');
        } else {
            return redirect()->back->with('error', 'Falha ao excluir!');
        }
    }
}
