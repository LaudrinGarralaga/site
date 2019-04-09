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
                <h5 class="m-0 font-weight-bold text-primary">Cadastro de produtos</h5>&nbsp;
              </div>
              <form class="user" method="post" action="{{route('produtos.store')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="nome" name="nome" placeholder="Nome do produto">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="val_avista" name="val_avista" placeholder="Valor do produto à vista">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="val_parcelado" name="val_parcelado" placeholder="Valor do produto parcelado">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="categoria_id">Qual o número do parcelas?</label>
                        <input type="number" class="form-control form-control-user" id="num_parcela" name="num_parcela" placeholder="Num. de parcelas">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="categoria_id">Qual categoria pertence este produto?</label>
                        <select class="form-control" id="categoria_id" name="categoria_id">
                            @foreach ($categorias as $categoria)    
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="categoria_id">Qual sub-categoria pertence esta produto?</label>
                        <select class="form-control" id="subcategoria_id" name="subcategoria_id">
                            @foreach ($subcategorias as $subcategoria)    
                                <option value="{{$subcategoria->id}}">{{$subcategoria->nome}}</option>
                            @endforeach    
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="categoria_id">Quais as características do produto?</label>
                        <input type="text" class="form-control form-control-user" id="caracteristica" name="caracteristica" placeholder="Digite as características do produto">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-7 mb-3 mb-sm-0">
                        <label for="exampleFormControlTextarea1">Descrição do produto</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea><br>
                    </div>
                    <div class="col-sm-5 mb-3 mb-sm-0">
                        {!!"<img src='' id='imagem' height='150' width='200' alt='imagem produto'>"!!} 
                        <input type="file" class="form-control-file" id="image" name="image" onchange="previewFile()" style="margin-top: 10px">
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
    var file    = document.getElementById('image').files[0];
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
           $('#val_avista').mask("##.###.##0,00", {reverse: true}); 
        });    
        </script>
@endsection