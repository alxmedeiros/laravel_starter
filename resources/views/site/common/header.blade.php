<!doctype html>
<head ng-app="shopApp">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Konjac Massa MF</title>

    <!-- seo -->
    <meta name="description" content="Konjac Massa MF"/>
    <link rel="canonical" href="https://konjacmassamf.com/" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Konjac Massa MF" />
    <meta property="og:description" content="A Konjac Massa MF é uma linha de massa de origem vegetal de (macarrão e arroz) com apenas 9 calorias em cada 100 gramas um produto Vegano." />
    <meta property="og:url" content="https://konjacmassamf.com/blog/sobre-a-konjac/" />
    <meta property="og:site_name" content="Konjac Massa MF" />
    <meta property="og:image" content="/site/img/facebook.jpg" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/site/css/style.css">
    <link rel="shortcut icon" href="/site/img/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="/site/img/apple-touch-icon-precomposed.png">

    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/78d5fcf335549ae1e85b6ea01/755492dce699a051cde0c2cf9.js");</script>

    <script src="https://cdn.ravenjs.com/3.25.2/raven.min.js" crossorigin="anonymous"></script>
    <script>
        Raven.config('https://d30d7c889ee84222aa3237747edaa68c@sentry.io/1212029').install()
    </script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">Você está utilizando um navegador <strong>desatualizado</strong>. Favor <a href="https://browsehappy.com/?locale=pt-br">atualizar seu navegador</a> para melhorar sua experiência.</p>
<![endif]-->
<div id="app">

    <!-- principal -->
    <div id="principal">
        @auth('customer')
        <!-- topobar -->
        <div class="topo-bar">
            <div class="container">
                <ul class="nav justify-content-end">
                    <li class="nav-item">Seja bem-vindo, {{ Auth::guard('customer')->user()->name }}</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.home') }}">Área do Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Sair</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </li>
                </ul>
            </div>
        </div>
        @endauth
        
        <!-- topo -->
        <header id="topo" class="container">
            <div class="">
                <!-- midias -->
                <ul class="midias nav align-items-center justify-content-end">
                    <!-- <li class="nav-item d-none d-sm-flex"><a href="/blog/revenda-konjac" title="Revenda Konjac">Revenda Konjac</a></li> -->
                    <li class="nav-item d-none d-lg-flex">Nossas redes</li>
                    <li class="nav-item">
                        <a class="nav-link active" href="https://www.facebook.com/konjacmassamfitness" target="_blank"><i class="ico-face"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="https://www.instagram.com/konjacmassa_mf/" target="_blank"><img src="/site/img/ico-insta.svg" class="svg icons" alt="Instagram"></a>
                    </li>
                </ul>
                <!-- menu -->
                <nav class="topo-menu navbar navbar-expand-sm px-0">

                    @if ( isPage('site.home') )
                    <h1 class="navbar-brand"><a href="{{ route('site.home') }}" class="logo-konjac" title="Konjac Massa MF">Konjac Massa MF</a></h1>
                    @else
                    <h2 class="navbar-brand"><a href="{{ route('site.home') }}" class="logo-konjac" title="Konjac Massa MF">Konjac Massa MF</a></h2>
                    @endif
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- ico menu mobile -->
                        <div class="ico-menu d-sm-none">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </button>

                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('site.products') }}">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog/sobre-a-konjac/">Sobre a Konjac</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="/blog/blog/">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog/faq/">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog/depiomentos/">Depoimentos</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="/blog/revenda-konjac/">Revenda/CNPJ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog/onde-comprar/">Onde Comprar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog/contato/">Contato</a>
                            </li>
                            <!-- <li class="nav-item d-block d-sm-none"><a href="/blog/seja-um-representante" title="Seja um representante">Seja um representante</a></li> -->
                        </ul>

                        <div class="bts-admin my-2 my-lg-0">
                            <a href="{{ route('cart') }}" class="btn btn-roxo btn-sacola" title="">
                                <i class="ico-bolsa"></i>
                                @if ( $cart_qty > 0 )
                                {{ $cart_qty }} itens
                                @else
                                    Sacola vazia
                                @endif
                            </a>
                            <a href="{{ route('customer.home') }}" class="btn btn-roxo" title=""><i class="ico-pessoa"></i> Minha Conta</a>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- //menu -->

        </header>
        <!-- //topo -->

        <!-- conteudo -->
        <main>