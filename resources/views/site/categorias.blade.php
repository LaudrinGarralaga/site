@extends('template.site')

@section('conteudo')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
                <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    @foreach($produtos as $produto)
                        @if ($loop->first)
                            <li class="breadcrumb-item"><a href="/">{{$produto->categoria->nome}}</a></li>  
                        @endif
                    @endforeach 
                    
                    {{--<div class="products-header" style="text-align: right">
                        <div>
                            <strong>Preço: </strong>
                            <a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}">Crescente |</a>
                            <a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'high_low'])}}">Decrescente</a>
                        </div>
                    </div>--}}
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
                            <div class="card-body" style="height: 300px">
                            <h5 class="card-title"><strong>{{$produto->nome}} -</strong> <span class="codigo" style="color: red">CÓD. {{$produto->codigo}}</span></h5> 
                                @if (empty($produto->val_avista_ata))
                                    <p class="card-text-2" style="margin-bottom: 0">R${{$produto->val_parcelado_un}} A UN. EM 3X SEM JUROS ou</p>                     
                                    <p class="card-text" style="margin-bottom: 95px">R${{$produto->val_avista_un}} A UN. À VISTA <br> (10% de desconto)</p>    
                                @else
                                    <p class="card-text-2" style="margin-bottom: 0">R${{$produto->val_parcelado_ata}} O PACOTE EM 3X SEM JUROS ou</p>                     
                                    <p class="card-text" style="margin-bottom: 5px">R${{$produto->val_avista_ata}} O PACOTE À VISTA <br> (10% de desconto)</p>    
                                    <p class="card-text-2" style="margin-bottom: 0">R${{$produto->val_parcelado_un}} A UN. EM 3X SEM JUROS ou</p>                     
                                    <p class="card-text" style="margin-bottom: 10px">R${{$produto->val_avista_un}} A UN. À VISTA <br> (10% de desconto)</p> 
                                @endif   
                            <a href="{{route('produtos.show', $produto->id)}}" class="btn btn-primary">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>          
        </div>
        {{--{{$produtos->links()}}--}}
        {{$produtos->appends(request()->input())->links()}}      
    </section> 
@endsection