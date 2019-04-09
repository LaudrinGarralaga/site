@extends('template.site')

@section('conteudo')
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- breadcrumb-->
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
              <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                <div class="item"> <img src="/img/{{$prod->image}}" alt="" class="img-fluid" style=""></div> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <h1 class="text-center">{{$prod->nome}}</h1>
                <p class="goToDescription"><a href="#details" class="scroll-to">Clique para ver detalhes do produto</a></p>
                <p class="price">à vista R${{$prod->val_avista}} <br> <span style="font-size: 15pt">ou {{$prod->num_parcela}}x de R${{$prod->val_parcelado}} sem juros</span></p>    
              </div>
            </div>
          </div>
          <div id="details" class="box">
            <p>
            <h4>Detalhes do produto</h4>
          <p style="text-align: justify">{{$prod->descricao}}</p>
            <h4>Características</h4>
              <ul>
                  @foreach(explode('#', $prod->caracteristica) as $info) 
                  <li>{{$info}}</li>
                @endforeach
              </ul>
            <hr>
          </div>
      </div>
    </div>
      <!-- /.col-md-9-->
    </div>
@endsection