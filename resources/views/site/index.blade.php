@extends('template.site')

@section('conteudo')

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
                            <a href="#" class="btn btn-primary">Mais detalhes</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
        {{ $produtos->links() }}
    </div>
</section>   
@endsection