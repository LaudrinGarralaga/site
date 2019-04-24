<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Me encanta cosméticos</title>
    <meta name="description" content="Site Me encanta cosméticos">
    <meta name="author" content="Láudrin Rei Garralaga">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <!-- owl carousel-->
    <link rel="stylesheet" href="/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/css/style.violet.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/favicon-32x32.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header mb-5">
      <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
      <div id="top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" ></a><a href="#" class="ml-1"></a></div>
            <div class="col-lg-6 text-center text-lg-right">
              <ul class="menu list-inline mb-0">
                <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Compras/contato WhatsApp: (53) 98474-4309</a></li>
                <li class="list-inline-item"><a href="#">E-mail - meencantacosmeticos@meencantacosmeticos.com.br</a></li>
              </ul>
            </div>
          </div>
        </div>      
      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="/" class="navbar-brand home"><img src="/img/logo.png" alt="me encanta logo" class="d-none d-md-inline-block" style="width: 250px; height: 70px"><img src="/img/logo.png" alt="me encanta logo" class="d-inline-block d-md-none" style="width: 140px; height: 50px"><span class="sr-only">Obaju - go to homepage</span></a>
          <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button>
          </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              @foreach($categorias as $categoria)
            <li class="nav-item dropdown menu-large"><a data-toggle="dropdown" data-hover="dropdown" data-delay="200" href="{{route('principal.categoria', $categoria->id)}}" class="dropdown-toggle nav-link">{{$categoria->nome}}<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-5">
                        <ul class="list-unstyled mb-3">
                          @foreach($subcategorias as $subcategoria)
                          @if ($subcategoria->categoria_id == $categoria->id)
                          <li class="nav-item"><a href="{{route('principal.subcategoria', $subcategoria->id)}}" class="nav-link">{{$subcategoria->nome}}</a></li>
                          @else
                          @endif
                          @endforeach 
                          {{-- <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->subcategoria, 'subcategoria' => 'acessorios'])}}" class="nav-link">Acessórios</a></li>
                          <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->subcategoria, 'subcategoria' => 'condicionador/shampoo'])}}" class="nav-link">Condicionador/Shampoo</a></li>
                          <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->subcategoria, 'subcategoria' => 'escovas/pentes'])}}" class="nav-link">Escovas/Pentes</a></li>
                          <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->subcategoria, 'subcategoria' => 'finalizador'])}}" class="nav-link">Finalizador</a></li>
                          --}}
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-5">
                          <ul class="list-unstyled mb-3">
                            {{-- <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Óleos</a></li>
                            <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Outras Colorações</a></li>
                            <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Tintura</a></li>
                            <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Toucas</a></li>
                          </ul> --}}
                        </div>
                    </div>
                  </li>
                </ul>
              </li>
              @endforeach 
              {{-- <li class="nav-item dropdown menu-large"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Depilação<b class="caret"></b></a>
                
              </li>
              <li class="nav-item dropdown menu-large"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">MANICURE<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-5">
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Acessórios</a></li>
                          <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Unhas/Pés</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown menu-large"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">MAQUIAGEM<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-5">
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Cílios</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown menu-large"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">ACESSÓRIOS PROFISSIONAIS<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-5">
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Aventais/Capas</a></li>
                          <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Descartáveis</a></li>
                          <li class="nav-item"><a href="{{route('principal', ['categoria' => request()->categoria, 'sort' => 'low_high'])}}" class="nav-link">Luvas</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </li> --}}
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>     
            </div>
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto" method="post" action="{{route('site.filtro')}}">
              {{ csrf_field() }}
            <div class="input-group">
              <input type="text" placeholder="Buscar produto" class="form-control" name="nome">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
    <div id="all">   
      <div id="content" style="margin-bottom: 73px">
        
        @yield('conteudo') 
        
      </div>
    </div>
 
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    <div id="footer">
      <div class="container">
        <div class="row">
          <!-- /.col-lg-3-->
          <div class="col-lg-4 col-md-6">
            <h4 class="mb-3" style="text-align: center">Onde nos encontrar</h4>
            <p style="text-align: center"><strong>Me Encanta Cosméticos.</strong><br>Rua Júlio de Castilhos<br>Número 1661 – Apto. 02 – Sala 02<br>Jaguarão<br>Rio Grande do Sul<br><strong>Brasil</strong></p>
            <hr class="d-block d-md-none">
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-4 col-md-6">        
            <h4 class="mb-3" style="text-align: center">Nossas redes sociais</h4>
            <p class="social" style="text-align: center"><a href="https://www.facebook.com/Me-Encanta-Cosm%C3%A9ticos-674945582961811/" class="facebook external"><i class="fa fa-facebook"></i></a><a href="https://www.instagram.com/meencantacosmeticos/" class="instagram external"><i class="fa fa-instagram"></i></a><a href="mailto:meencantacosmeticos@meencantacosmeticos.com.br" class="email external"><i class="fa fa-envelope"></i></a></p>
            <hr class="d-block d-md-none">
          </div>
          <!-- /.col-lg-3-->
          <div class="col-lg-4 col-md-6">     
            <h4 style="text-align: center" class="mb-3">Formas de pagamento</h4>
            <p style="margin-bottom: -5px">Crédito em 3x sem juros</p>   
            <img src="/img/cartoes.jpg" alt="formas de pagamento" class="img-fluid">
          </div>
          <!-- /.col-lg-3-->
        </div>
        <!-- /.row-->
      </div>
      <!-- /.container-->
    </div>
    <!-- /#footer-->
    <!-- *** FOOTER END ***-->
    
    
    <!--
    *** COPYRIGHT ***
    _________________________________________________________
    -->
    <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mb-2 mb-lg-0">
            <p class="text-center "><span>Me encanta cosméticos&reg; é uma marca registrada de Carol – Comércio, Importação e Exportação de Cosméticos Ltda. | CNPJ 04.650.066/0001-88. | Todos os direitos reservados.</span></p>
          </div>
        </div>
      </div>
    </div>
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="/jquery/jquery.min.js"></script>
    <script src="/jquery/jquery.zoom.js"></script>
    <script src="/jquery/jquery.zoom.min.js"></script>
    <script src="/jquery/jquery.mask.min.js"></script>
    <script src="/jquery/jquery.mask.js"></script>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/owl.carousel/owl.carousel.min.js"></script>
    <script src="/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="/js/front.js"></script>
  </body>
</html>