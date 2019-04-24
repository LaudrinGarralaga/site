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
                @if (empty($prod->val_parcelado_ata))
                  <p class="goToDescription"><a href="#details" class="scroll-to">Clique para ver detalhes do produto</a></p>
                  <p class="price" style="font-size: 12pt">R${{$prod->val_parcelado_un}} a un. em 3x sem juros ou<br> <span class="card-text" style="font-size: 15pt">R${{$prod->val_avista_un}} a un. à vista (10% de desconto)</span></p>    
                @else
                  <p class="goToDescription"><a href="#details" class="scroll-to">Clique para ver detalhes do produto</a></p>
                  <p class="price" style="font-size: 12pt">R${{$prod->val_parcelado_ata}} o pacote em 3x sem juros ou<br> <span class="card-text" style="font-size: 15pt">R${{$prod->val_avista_ata}} o pacote à vista (10% de desconto)</span></p> 
                  <p class="price" style="font-size: 12pt">R${{$prod->val_parcelado_un}} a un. em 3x sem juros ou<br> <span class="card-text" style="font-size: 15pt">R${{$prod->val_avista_un}} a un. à vista (10% de desconto)</span></p>   
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