@extends('template.site')

@section('conteudo')
<div class="container">
  <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">{{$prod->categoria->nome}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{$prod->subcategoria->nome}}</a></li>
            <li aria-current="page" class="breadcrumb-item active">{{$prod->nome}}</li>
          </ol>
        </nav>
      </div>
      <div class="col-lg-12 ">
          <div id="productMain" class="row">
            <div class="col-md-6">
              <div id="mainImage">
                <div class="item">   
                    <span class='zoom' id='ex1'>
                      <img src="/img/{{$prod->image}}" alt="foto produto" class="img-fluid" width="540px" height="600px"> 
                    </span>
                </div> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <h1 class="text-center" style="font-size: 15pt">{{$prod->nome}} - <span class="codigo" style="color: red">CÓD. {{$prod->codigo}}</span></h1>
                  @if (empty($prod->val_avista_ata) && $prod->codigo != "3254/3255/3256")
                      <p class="card-text-2" style="margin-bottom: 0">R${{$prod->val_parcelado_un}} EM ATÉ 3X SEM JUROS ou</p>                     
                      <p class="card-text" style="margin-bottom: 95px">R${{$prod->val_avista_un}} À VISTA <br> (10% de desconto)</p>    
                  @elseif ($prod->codigo == "3254/3255/3256")
                      <p class="card-text-2" style="margin-bottom: 0">R${{$prod->val_parcelado_un}} O PAR EM ATÉ 3X SEM JUROS ou</p>                     
                      <p class="card-text" style="margin-bottom: 95px">R${{$prod->val_avista_un}} O PAR À VISTA <br> (10% de desconto)</p>
                  @else
                      <p class="card-text-2" style="margin-bottom: 0">R${{$prod->val_parcelado_ata}} O PACOTE EM ATÉ 3X SEM JUROS ou</p>                     
                      <p class="card-text" style="margin-bottom: 5px">R${{$prod->val_avista_ata}} O PACOTE À VISTA <br> (10% de desconto)</p>    
                      <p class="card-text-2" style="margin-bottom: 0">R${{$prod->val_parcelado_un}} A UN. EM ATÉ 3X SEM JUROS ou</p>                     
                      <p class="card-text" style="margin-bottom: 10px">R${{$prod->val_avista_un}} A UN. À VISTA <br> (10% de desconto)</p> 
                  @endif
              </div>
            </div>
          </div>
          <div id="details" class="box">
            <p>
            <h4>Descrição do produto</h4>
              <p style="text-align: justify">{{$prod->descricao}}</p>
              <hr>
            <h4>Modo de usar</h4>
            @if (($prod->como_usar))
              <p style="text-align: justify">{{$prod->como_usar}}</p>
            @else
              <p>Nenhum</p>
            @endif
            <hr>
            <h4>Características</h4>
              @if (empty($prod->caracteristicas)) 
                <ul>
                  <li>Nenhuma</li>
                </ul>
              @else
                <ul>
                  @foreach(explode('#', $prod->caracteristicas) as $info) 
                    <li>{{$info}}</li>
                  @endforeach
                </ul>
              @endif
              <hr>
            <h4>Observações</h4>
            @if (($prod->observacoes))
              <p style="text-align: justify">{{$prod->observacoes}}</p>
            @else
              Sem observações
            @endif
          </div>
      </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('#ex1').zoom();
  });
</script>
@endsection