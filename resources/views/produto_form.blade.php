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
                        <label for="categoria_id">Nome do produto</label>
                        <input type="text" class="form-control form-control-user" id="nome" name="nome" placeholder="Digite o nome do produto">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Código do produto</label>
                        <input type="text" class="form-control form-control-user" id="codigo" name="codigo" placeholder="Digite o código do produto">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Desconto</label>
                        <input type="text" class="form-control form-control-user" id="desconto" name="desconto" placeholder="Digite o valor do desconto">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Valor à vista (unidade)</label>
                        <input type="text" class="form-control form-control-user money" id="valor1" name="val_avista_un" placeholder="valor da un. do produto à vista">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Valor parcelado (unidade)</label>
                        <input type="text" class="form-control form-control-user money" id="valor2" name="val_parcelado_un" placeholder="Valor da un. do produto parcelado">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Valor à vista (atacado)</label>
                        <input type="text" class="form-control form-control-user money" id="valor3" name="val_avista_ata" placeholder="Valor atacado do produto à vista">
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="categoria_id">Valor parcelado (atacado)</label>
                        <input type="text" class="form-control form-control-user money" id="valor4" name="val_parcelado_ata" placeholder="Valor atacado do produto parcelado">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Qual categoria pertence este produto?</label>
                        <select class="form-control" id="categoria" name="categoria_id" sel>
                            @foreach ($categorias as $categoria)    
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Qual sub-categoria pertence este produto?</label>
                        <select class="form-control" id="subcategoria" name="subcategoria_id">
                             <option value=""></option>  
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea><br>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Características</label>
                        <input type="text" class="form-control form-control-user" id="caracteristicas" name="caracteristicas" placeholder="digite as características do produto">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Modo de usar</label>
                        <input type="text" class="form-control form-control-user" id="como_usar" name="como_usar" placeholder="digite como usar o produto">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="categoria_id">Observações</label>
                        <textarea type="text" class="form-control" id="observacoes" name="observacoes" placeholder="digite as observações do produto" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
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

@endsection