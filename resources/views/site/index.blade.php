@extends('template.site')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <div class="products-header" style="text-align: right">
                    <div>
                        <strong>Preço: </strong>
                        <a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}">Crescente |</a>
                        <a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'high_low'])}}">Decrescente</a>
                    </div>
                </div>
            </ol>
            </nav>
        </div>
    </div>
</div>

<section class="details-card">
    <div class="container">
        <div class="row">
            @foreach($produtos as $produto)
            <div class="col-md-3">
                <div class="card-content">
                    <div class="card-img">
                        <img class="card-img-top" src="{{asset('/img/' . $produto->image)}}" alt="imagem produto">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{$produto->nome}}</strong></h5>                         
                            <p class="card-text">R${{$produto->val_avista}} À VISTA</p>
                            <P  class="card-text-2">ou {{$produto->num_parcela}}X DE R${{$produto->val_parcelado}} SEM JUROS</P>
                        <a href="{{route('produtos.show', $produto->id)}}" class="btn btn-primary">Mais detalhes</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        {{--{{$produtos->links()}}--}}
        {{$produtos->appends(request()->input())->links()}} 
    </div>
</section> 
  
@endsection