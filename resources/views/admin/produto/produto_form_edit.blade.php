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
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        <label for="categoria_id">Nome do produto</label>
                        <input type="text" class="form-control form-control-user" id="nome" name="nome" placeholder="digite o nome do produto" value="{{$reg->nome}}">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="categoria_id">Código do produto</label>
                        <input type="text" class="form-control form-control-user" id="codigo" name="codigo" placeholder="digite o código do produto" value="{{$reg->codigo}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Valor à vista (unidade)</label>
                        <input type="text" class="form-control form-control-user money" id="valor1" name="val_avista_un" placeholder="valor da un. do produto à vista" value="{{$reg->val_avista_un}}">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Valor parcelado (unidade)</label>
                        <input type="text" class="form-control form-control-user money" id="valor2" name="val_parcelado_un" placeholder="Valor da un. do produto parcelado" value="{{$reg->val_parcelado_un}}">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Valor à vista (atacado)</label>
                        <input type="text" class="form-control form-control-user money" id="valor3" name="val_avista_ata" placeholder="Valor atacado do produto à vista" value="{{$reg->val_avista_ata}}">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Valor parcelado (atacado)</label>
                        <input type="text" class="form-control form-control-user money" id="valor4" name="val_parcelado_ata" placeholder="Valor atacado do produto parcelado" value="{{$reg->val_parcelado_ata}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Qual categoria pertence este produto?</label>
                        <select class="form-control" id="categoria" name="categoria_id">
                            @foreach ($categorias as $categoria)    
                                <option value="{{$categoria->id}}"
                                     @if ((isset($reg) && $reg->categoria_id==$categoria->id) 
                                     or old('categoria_id') == $categoria->id) selected @endif>
                                    {{$categoria->nome}}</option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Qual sub-categoria pertence esta produto?</label>
                        <select class="form-control" id="subcategoria" name="subcategoria_id">
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
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3">{{$reg->descricao}}</textarea><br>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Características</label>
                        <input type="text" class="form-control form-control-user" id="caracteristicas" name="caracteristicas" placeholder="digite as características do produto" value="{{$reg->caracteristicas}}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Modo de usar</label>
                        <input type="text" class="form-control form-control-user" id="como_usar" name="como_usar" placeholder="digite como usar o produto" value="{{$reg->como_usar}}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Observações</label>
                        <textarea type="text" class="form-control" id="observacoes" name="observacoes" placeholder="digite as observações do produto" rows="3">{{$reg->observacoes}}</textarea>
                    </div>
                </div>    
                <div class="form-group row">
                    <div class="col-sm-3" style="text-align: center">
                        @php
                            if (file_exists(public_path('/img/'. $reg->image))) {
                                $foto = '/../img/'. $reg->image;
                            } else {
                                $foto = '/../img/sem_foto.jpg';
                            }
                        @endphp
                        {!!"<img src=$foto id='imagem' height='150' width='200' alt='Foto'>"!!}
                        <p>
                            <div class="form-group">
                                <input type="file" id="foto" name="image" onchange="previewFile()" class="form-control">
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
<script>
$(document).ready(function() {  
    $('#categoria').on('change', function(e){
        console.log(e);
        var state_id = e.target.value;

        $.get('{{ url('information') }}/create/ajax-state?state_id=' + state_id, function(data) {
            console.log(data);
            $('#subcategoria').empty();
            $.each(data, function(index,subCatObj){
                $('#subcategoria').append('<option value="'+subCatObj.id+'">'+subCatObj.nome+'</option>');
            });
        });
    });
});
</script>
<script>
    $(document).ready(function() {
        $('#valor1,#valor2,#valor3,#valor4').mask("##.###.##0,00", {reverse: true}); 
    });       
</script>
@endsection