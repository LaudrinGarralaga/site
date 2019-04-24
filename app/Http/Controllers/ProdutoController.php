<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
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

        return view('produto_list', compact('produtos'));
    }

    
    public function create()
    {
        // Verifica se  está logado
        if (!Auth::check()) {
            return redirect('/');
        }

        $categorias = Categoria::orderBy('nome')->get();
        $subcategorias = Subcategoria::orderBy('nome')->get();
       
        return view('produto_form', compact('categorias', 'subcategorias'));
    }

    
    public function store(Request $request)
    {

        $produto = new Produto();

        // Obtém os dados do formulário
        $produto->nome = $request->input('nome');
        $produto->codigo = $request->input('codigo');
        $produto->val_avista_un = $request->input('val_avista_un');
        $produto->val_parcelado_un = $request->input('val_parcelado_un');
        $produto->val_avista_ata = $request->input('val_avista_ata');
        $produto->val_parcelado_ata = $request->input('val_parcelado_ata');
        $produto->descricao = $request->input('descricao');
        $produto->caracteristicas = $request->input('caracteristicas');
        $produto->como_usar = $request->input('como_usar');
        $produto->observacoes = $request->input('observacoes');
        $produto->categoria_id = $request->input('categoria_id');
        $produto->subcategoria_id = $request->input('subcategoria_id');

        if ($request->hasfile('image')) {
            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            //$image_resize->resize(540, 678);
            $image_resize->save(public_path('img/' .$filename));
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
        $prod = Produto::find($id);
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        return view ('site.detalhes', compact('prod', 'categorias', 'subcategorias'));
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

        return view('produto_form_edit', compact('reg','categorias', 'subcategorias'));
    }

    
    public function update(Request $request, $id)
    {
        // Posiciona no registo a ser alterado
        $reg = Produto::find($id);

        $reg->nome = $request->input('nome');
        $reg->codigo = $request->input('codigo');
        $reg->val_avista_un = $request->input('val_avista_un');
        $reg->val_parcelado_un = $request->input('val_parcelado_un');
        $reg->val_avista_ata = $request->input('val_avista_ata');
        $reg->val_parcelado_ata = $request->input('val_parcelado_ata');
        $reg->descricao = $request->input('descricao');
        $reg->caracteristicas = $request->input('caracteristicas');
        $reg->como_usar = $request->input('como_usar');
        $reg->observacoes = $request->input('observacoes');
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
