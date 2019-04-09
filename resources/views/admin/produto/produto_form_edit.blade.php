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
                <h5 class="m-0 font-weight-bold text-primary">Alteração de produtos</h5>&nbsp;
              </div>
              <form class="user" method="post" action="{{route('produtos.update', $reg->id)}}" enctype="multipart/form-data">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="nome" name="nome" placeholder="Nome do produto" value="{{$reg->nome}}">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="val_avista" name="val_avista" placeholder="Valor do produto à vista" value="{{$reg->val_avista}}">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="val_parcelado" name="val_parcelado" placeholder="Valor do produto parcelado" value="{{$reg->val_parcelado}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="categoria_id">Qual o número do parcelas?</label>
                        <input type="number" class="form-control form-control-user" id="num_parcela" name="num_parcela" placeholder="Num. de parcelas" value="{{$reg->num_parcela}}">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="categoria_id">Qual categoria pertence este produto?</label>
                        <select class="form-control" id="categoria_id" name="categoria_id">
                            @foreach ($categorias as $categoria)    
                                <option value="{{$categoria->id}}"
                                     @if ((isset($reg) && $reg->categoria_id==$categoria->id) 
                                     or old('categoria_id') == $categoria->id) selected @endif>
                                    {{$categoria->nome}}</option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="categoria_id">Qual sub-categoria pertence esta produto?</label>
                        <select class="form-control" id="subcategoria_id" name="subcategoria_id">
                            @foreach ($subcategorias as $subcategoria)    
                                <option value="{{$subcategoria->id}}"
                                @if ((isset($reg) && $reg->subcategoria_id==$subcategoria->id) 
                                 or old('subcategoria_id') == $subcategoria->id) selected @endif>
                                {{$subcategoria->nome}}</option>
                            @endforeach    
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="descricao">Descrição do produto</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" >{{$reg->descricao}}</textarea><br>
                    </div>        
                    <div class="col-sm-3" style="text-align: center">
                        @php
                            if (file_exists(public_path('img/'.$reg->image))) {
                                $foto = '../img/'.$reg->image;
                            } else {
                                $foto = '../img/sem_foto.jpg';
                            }
                        @endphp
                        {!!"<img src=$foto id='imagem' height='150' width='200' alt='Foto'>"!!}
                        <p>
                            <div class="form-group">
                                <input type="file" id="foto" name="foto" onchange="previewFile()" class="form-control">
                            </div>
                        </p>
                    </div>       
                </div>            
                <button type="submit" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-database"></i></span><span class="text">Salvar</span></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
function previewFile() {
    var preview = document.getElementById('imagem');
    var file    = document.getElementById('foto').files[0];
    var reader  = new FileReader();
    
    reader.onloadend = function() {
        preview.src = reader.result;
    };
    
    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }    
}
</script>
@endsection