@extends('template.site')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- breadcrumb-->
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
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
            @if ($produtos->count() == 0)
               <h3 style="margin-left: auto; margin-right: auto; margin-top: 50px">Sem produtos...</h3>
            @else
                
            @endif
            @foreach($produtos as $produto)
            <div class="col-md-3">
                <div class="card-content">
                    <div class="card-img">
                        <img class="card-img-top" src="{{asset('/img/' . $produto->image)}}" alt="imagem produto">
                        <div class="card-body" style="height: 300px">
                        <h5 class="card-title"><strong>{{$produto->nome}} -</strong> <span class="codigo" style="color: red">CÓD. {{$produto->codigo}}</span></h5> 
                            @if (empty($produto->val_avista_ata) && $produto->codigo != "3254/3255/3256" && $produto->codigo != "6850" && $produto->codigo != "6852")
                                <p class="card-text-2" style="margin-bottom: 0">R${{$produto->val_parcelado_un}} EM ATÉ 3X SEM JUROS ou</p>                     
                                <p class="card-text" style="margin-bottom: 95px">R${{$produto->val_avista_un}} À VISTA <br> (10% de desconto)</p>    
                            @elseif ($produto->codigo == "3254/3255/3256")
                                <p class="card-text-2" style="margin-bottom: 0">R${{$produto->val_parcelado_un}} O PAR EM ATÉ 3X SEM JUROS ou</p>                     
                                <p class="card-text" style="margin-bottom: 95px">R${{$produto->val_avista_un}} O PAR À VISTA <br> (10% de desconto)</p>
                            @elseif ($produto->codigo == "6850")
                                <p class="card-text-2" style="margin-bottom: 0">R${{$produto->val_parcelado_un}} A UN. EM ATÉ 3X SEM JUROS ou</p>                     
                                <p class="card-text" style="margin-bottom: 95px">R${{$produto->val_avista_un}} A UN. À VISTA <br> (10% de desconto)</p>
                            @elseif ($produto->codigo == "6852")
                                <p class="card-text-2" style="margin-bottom: 0">R${{$produto->val_parcelado_un}} A UN. EM ATÉ 3X SEM JUROS ou</p>                     
                                <p class="card-text" style="margin-bottom: 95px">R${{$produto->val_avista_un}} A UN. À VISTA <br> (10% de desconto)</p>
                            @else
                                <p class="card-text-2" style="margin-bottom: 0">R${{$produto->val_parcelado_ata}} O PACOTE EM ATÉ 3X SEM JUROS ou</p>                     
                                <p class="card-text" style="margin-bottom: 5px">R${{$produto->val_avista_ata}} O PACOTE À VISTA <br> (10% de desconto)</p>    
                                <p class="card-text-2" style="margin-bottom: 0">R${{$produto->val_parcelado_un}} A UN. EM ATÉ 3X SEM JUROS ou</p>                     
                                <p class="card-text" style="margin-bottom: 10px">R${{$produto->val_avista_un}} A UN. À VISTA <br> (10% de desconto)</p> 
                            @endif   
                        <a href="{{route('produtos.show', $produto->id)}}" class="btn btn-primary">Mais detalhes</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        
    </div>
    {{$produtos->links()}}
    {{-- {{$produtos->appends(request()->input())->onEachSide(5)->links()}}  --}}
</section> 
  
@endsection