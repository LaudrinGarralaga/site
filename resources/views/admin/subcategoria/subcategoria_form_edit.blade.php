@extends('template.admin')

@section('conteudo')
<div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h5 class="m-0 font-weight-bold text-primary">Cadastro de sub-categoria</h5>&nbsp;
                  </div>
                  <form class="user" method="post" action="{{route('subcategorias.update', $reg->id)}}">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="nome" name="nome" placeholder="Nome da sub-categoria" value="{{$reg->nome}}">
                      </div>
                    </div>
                    <div class="col-sm-12 mb-3 mb-sm-10">
                        <label for="categoria_id">Qual categoria pertence esta sub-categoria?</label>
                        <select class="form-control" id="categoria_id" name="categoria_id">
                            @foreach ($categorias as $categoria)    
                                <option value="{{$categoria->id}}"
                                @if ((isset($reg) && $reg->categoria_id==$categoria->id) 
                                        or old('categoria_id') == $categoria->id) selected @endif>{{$categoria->nome}}</option>
                            @endforeach    
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-database"></i></span><span class="text">Salvar</span></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection