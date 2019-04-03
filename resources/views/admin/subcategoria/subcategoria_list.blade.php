@extends('template.admin')

@section('conteudo')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabela de sub-categorias</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome sub-categoria</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nome sub-categoria</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($subcategorias as $subcategoria)
                    <tr>
                        <td style="width: 40%">{{$subcategoria->nome}}</td>
                        <td style="width: 40%">{{$subcategoria->categoria->nome}}</td>
                        <td> <a href='{{route('subcategorias.edit', $subcategoria->id)}}'
                                class='btn btn-info' 
                                role='button'><i class="fas fa-pencil-alt"></i> Alterar </a>
                            <form style="display: inline-block"
                                method="post"
                                action="{{route('subcategorias.destroy', $subcategoria->id)}}"
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
<a href="{{route('subcategorias.create')}}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Nova sub-categoria</span>
    </a>
@endsection