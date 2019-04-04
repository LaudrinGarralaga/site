<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use App\Produto;
use App\Subcategoria;

class ProdutoController extends Controller
{
    public function index()
    {
        // Verifica se  está logado
        if (!Auth::check()) {
            return redirect('/');
        }
        // Recupera todas as categorias do banco
        $produtos = Produto::All();

        return view('admin.produto.produto_list', compact('produtos'));
    }

    
    public function create()
    {
        // Verifica se  está logado
        if (!Auth::check()) {
            return redirect('/');
        }

        $categorias = Categoria::orderBy('nome')->get();
        $subcategorias = Subcategoria::orderBy('nome')->get();
       
        return view('admin.produto.produto_form', compact('categorias', 'subcategorias'));
    }

    
    public function store(Request $request)
    {

        $produto = new Produto();

        // Obtém os dados do formulário
        $produto->nome = $request->input('nome');
        $produto->val_avista = $request->input('val_avista');
        $produto->val_parcelado = $request->input('val_parcelado');
        $produto->num_parcela = $request->input('num_parcela');
        $produto->descricao = $request->input('descricao');
        $produto->categoria_id = $request->input('categoria_id');
        $produto->subcategoria_id = $request->input('subcategoria_id');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('img/', $filename);
            $produto->image = $filename;
        }

        // Realiza a inclusão
        

        // Exibe uma mensagem de sucesso se gravou os dados no bando senão exibe uma de erro
        if ($produto->save()) {
            return redirect()->route('produtos.index')
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

        $categorias = Categoria::orderBy('nome')->get();
        $subcategorias = Subcategoria::orderBy('nome')->get();

        // Posiciona no registo a ser alterado
        $reg = Produto::find($id);

        return view('admin.produto.produto_form_edit', compact('reg','categorias', 'subcategorias'));
    }

    
    public function update(Request $request, $id)
    {
        // Posiciona no registo a ser alterado
        $reg = Produto::find($id);

        $reg->nome = $request->input('nome');
        $reg->val_avista = $request->input('val_avista');
        $reg->val_parcelado = $request->input('val_parcelado');
        $reg->num_parcela = $request->input('num_parcela');
        $reg->descricao = $request->input('descricao');
        $reg->categoria_id = $request->input('categoria_id');
        $reg->subcategoria_id = $request->input('subcategoria_id');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('img/', $filename);
            $reg->image = $filename;
        }
        
        
        
        // Realiza a alteração
        $alt = $reg->save();
        // Exibe uma mensagem de sucesso se alterou os dados no bando senão exibe uma de erro
        if ($alt) {
            return redirect()->route('produtos.index')
                ->with('alter', $request->nome . ' Alterado(a) com sucesso!');
        } else {
            return redirect()->back->with('error', 'Falha ao alterar!');
        }
    }

    
    public function destroy($id)
    {
        // Posiciona no registo a ser alterado
        $cat = Produto::find($id);
        // Exibe uma mensagem se excluiu com sucesso dados, senão exibe uma de erro
        if ($cat->delete()) {
            return redirect()->route('produtos.index')
                ->with('trash', $cat->nome . ' Excluído(a) com sucesso!');
        } else {
            return redirect()->back->with('error', 'Falha ao excluir!');
        }
    }
}
