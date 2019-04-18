@extends('template.admin')

@section('conteudo')
<a href="{{route('produtos.create')}}" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Novo produto</span>
</a><br><br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabela de produtos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Código</th>
                        <th>Categoria</th>
                        <th>Sub-categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Código</th>
                        <th>Categoria</th>
                        <th>Sub-categoria</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                        <td>{{$produto->nome}}</td>
                        <td>{{$produto->codigo}}</td>
                        <td>{{$produto->categoria->nome}}</td>
                        <td>{{$produto->subcategoria->nome}}</td>
                        <td> <a href='{{route('produtos.edit', $produto->id)}}'
                                class='btn btn-info' 
                                role='button'><i class="fas fa-pencil-alt"></i> Alterar </a>
                            <form style="display: inline-block"
                                method="post"
                                action="{{route('produtos.destroy', $produto->id)}}"
                                onsubmit="return confirm('Confirma Exclusão?')">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <button type="submit"
                                        class="btn btn-danger"><i class="fas fa-trash"></i> Excluir </button>
                            </form>                                         
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>  
@endsection