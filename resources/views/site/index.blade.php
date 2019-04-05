@extends('template.site')

@section('conteudo')

<section class="details-card">
    <div class="container">
        <div class="products-header" style="text-align: right; margin-bottom: 10px">
            <div>
                <strong>Preço: </strong>
                <a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}">Crescente |</a>
                <a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'high_low'])}}">Decrescente</a>
            </div>
        </div>
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
        </div>
        {{--{{$produtos->links()}}--}}
        {{$produtos->appends(request()->input())->links()}} 
    </div>
</section>   
@endsection