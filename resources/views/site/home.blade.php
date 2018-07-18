@extends('site.common.layout')

@section('content')
<!-- painel -->
<section class="painel">
    <ul class="painel-slider">
        
        <li><a href="https://konjacmassamf.com/produtos">
            <img srcset="/site/img/painel13-m.jpg 440w,
                /site/img/painel13.jpg 1920w"
            sizes="(max-width: 440px) 440px,
                (max-width: 1920px) 100vw, 1920px"
            src="/site/img/painel13.jpg" alt="Konjac Massa MF">
           <!--  <picture>
                <source media="(min-width: 465px)" srcset="/site/img/painel13.jpg">
                <img src="/site/img/painel13-m.jpg" alt="">
            </picture> -->
        </a></li>
        <li><a href="https://konjacmassamf.com/produtos">
            <img srcset="/site/img/painel1-m.jpg 440w,
                /site/img/painel1.jpg 1920w"
            sizes="(max-width: 440px) 440px,
                (max-width: 1920px) 100vw, 1920px"
            src="/site/img/painel1.jpg" alt="Konjac Massa MF">
            <!-- <picture>
                <source media="(min-width: 465px)" srcset="/site/img/painel1.jpg">
                <img src="/site/img/painel1-m.jpg" alt="">
            </picture> -->
        </a></li>
        <!-- <li><a href="https://konjacmassamf.com/blog/9-beneficios-ao-utilizar-os-produtos-konjac-diariamente/" title="">
            <img srcset="/site/img/painel3-m.jpg 440w,
                /site/img/painel3.jpg 1920w"
            sizes="(max-width: 440px) 440px,
                (max-width: 1920px) 100vw, 1920px"
            src="/site/img/painel3.jpg" alt="Konjac Massa MF">
            <picture>
                <source media="(min-width: 465px)" srcset="/site/img/painel3.jpg">
                <img src="/site/img/painel3-m.jpg" alt="">
            </picture>
        </a></li> -->
        <li><a href="https://konjacmassamf.com/produtos">
            <img srcset="/site/img/painel11-m.jpg 440w,
                /site/img/painel11.jpg 1920w"
            sizes="(max-width: 440px) 440px,
                (max-width: 1920px) 100vw, 1920px"
            src="/site/img/painel11.jpg" alt="Konjac Massa MF">
            <!-- <picture>
                <source media="(min-width: 465px)" srcset="/site/img/painel11.jpg">
                <img src="/site/img/painel11-m.jpg" alt="">
            </picture> -->
        </a></li>
    </ul>
</section>
<!-- //painel -->

@if ( count($productsListTop) )
<!-- produtos -->
<div class="produtos-indx container">
    <div class="row">
        @foreach ($productsListTop as $product)
            <div class="produtos-item col-12 col-sm-4">
                <a href="{{ route('site.product.detail', ['product_slug' => $product->sku]) }}" title="{{ $product->short_name }}">
                    <img src="{{ $product->getThumbnailFiltered() }}" alt="">
                    <h2 class="produtos-item-titulo">
                        {{ $product->short_name }}<span>Konjac Massa</span>
                    </h2>
                    <p class="produtos-item-valor"><sub>R$</sub> {{ $product->price }}
                    </p>
                    <small class="frete">FRETE GRÁTIS</small>
                </a>
                <a href="{{ route('site.product.detail', ['product_slug' => $product->sku]) }}" class="btn btn-roxo" title="">Comprar</a>
            </div>
        @endforeach
    </div>
</div>
<!-- //produtos -->
@endif

@if ( count($highlightedProduct) )
<!-- produto destaque -->
@foreach($highlightedProduct as $product)
<section class="produto-destaque parallax" data-speed="15" style="background-image:url('{{ $product->cover }}');">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-5 ml-lg-5 col-lg-3 text-center">
                <img src="{{ $product->getThumbnailFiltered() }}" class="d-inline-block" alt="{{ $product->short_name }}">
            </div>
            <div class="produto-destaque-item col-12 col-sm-4 col-lg-5">
                <h2 class="produto-destaque-titulo">{{ $product->short_name }} <span>Konjac Massa</span></h2>
                <p class="produto-destaque-valor"><sub>R$</sub> {{ $product->price }}
                </p>
                <small class="frete">FRETE GRÁTIS</small>
                <a href="{{ route('site.product.detail', ['product_slug' => $product->sku]) }}" class="btn btn-verde" title="Comprar">Comprar</a>
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- //produto destaque -->
@endif

@if ( count($productsListBottom) )
    <!-- produtos -->
    <div class="produtos-indx container">
        <div class="row">
            @foreach ($productsListBottom as $product)
                <div class="produtos-item col-12 col-sm-4">
                    <a href="{{ route('site.product.detail', ['product_slug' => $product->sku]) }}" title="{{ $product->short_name }}">
                        <img src="{{ $product->getThumbnailFiltered() }}" alt="">
                        <h2 class="produtos-item-titulo">
                            {{ $product->short_name }}<span>Konjac Massa</span>
                        </h2>
                        <p class="produtos-item-valor"><sub>R$</sub> {{ $product->price }}
                        </p>
                        <small class="frete">FRETE GRÁTIS</small>
                    </a>
                    <a href="{{ route('site.product.detail', ['product_slug' => $product->sku]) }}" class="btn btn-roxo" title="Comprar">Comprar</a>
                </div>
            @endforeach
                <div class="produtos-item col-12 col-sm-4">
                    <a href="https://konjacmassamf.com/produtos" title="Produtos Konjac"><img src="/site/img/banner-produtos.jpg" alt="">
                        <h2 class="produtos-item-titulo">A partir de 25 unidades</h2>
                        <p class="produtos-item-valor">Pacote sai por R$ 22,00</p>
                    </a>
                    <a href="https://konjacmassamf.com/produtos" class="btn btn-roxo" style="margin-top:1rem;" title="Comprar">Comprar</a>
                </div>
        </div>
    </div>
    <!-- //produtos -->
@endif

<!-- pratos clientes -->
<section class="pratos">
    <div class="container">
        <h2 class="depos-titulo">Pratos criados pelos nossos clientes<span>de todas as partes do Brasil</span></h2>
        <div class="row">
            
            <div class="pratos-item col-12 col-sm-3 p-0">
                <figure class="pratos-item-img">
                <a href="https://www.instagram.com/p/BjdgbyEgFBb/?taken-by=marcia.martinsbr" title="Veja no Instagram de @marcia.martinsbr" target="_blank">
                <img src="https://konjacmassamf.com/blog/wp-content/uploads/2018/06/insta-marcia.jpg" alt="Instagram de @marcia.martinsbr">
                <figcaption class="pratos-item-artista">@marcia.martinsbr</figcaption>
                </a>
                </figure>
            </div>
            <div class="pratos-item col-12 col-sm-3 p-0">
                <figure class="pratos-item-img">
                <a href="https://www.instagram.com/p/BjVCUTUBKvl/?taken-by=marquesnara" title="Veja no Instagram de @marquesnara" target="_blank">
                <img src="https://konjacmassamf.com/blog/wp-content/uploads/2018/06/insta-nara.jpg" alt="Instagram de @marquesnara">
                <figcaption class="pratos-item-artista">@marquesnara</figcaption>
                </a>
                </figure>
            </div>
            <div class="pratos-item col-12 col-sm-3 p-0">
                <figure class="pratos-item-img">
                <a href="https://www.instagram.com/p/BjU6KcdFptj/?taken-by=karen_gavioli" title="Veja no Instagram de @karen_gavioli" target="_blank">
                <img src="https://konjacmassamf.com/blog/wp-content/uploads/2018/06/insta-karen.jpg" alt="Instagram de @karen_gavioli">
                <figcaption class="pratos-item-artista">@karen_gavioli</figcaption>
                </a>
                </figure>
            </div>

            <div class="pratos-item col-12 col-sm-3 p-0">
                <figure class="pratos-item-img">
                <a href="https://www.instagram.com/p/BiCfi1YFdca/?taken-by=aanutri" title="Veja no Instagram de aanutri" target="_blank">
                    <img src="https://konjacmassamf.com/blog/wp-content/uploads/2018/06/insta-aanutri.jpg" alt="Instagram de aanutri">
                    <figcaption class="pratos-item-artista">@aanutri</figcaption>
                </a>
                </figure>
            </div>

        </div>
        <div class="d-block text-center my-4">
            <a href="https://www.konjacmassamf.com/blog/pratos-criados-pelos-nossos-clientes/" class="btn btn-roxo" title="Mais fotos">Mais fotos</a>
        </div>
        
    </div>
    

</section>

<!-- pratos clientes -->

<!-- depoimentos -->
<section class="depos">
    <div class="container">
        <h2 class="depos-titulo">Conheça o Konjac <span>e saiba como preparar</span></h2>
        <p class="depos-info">Veja os vídeos</p>
        <div class="row">
            <div class="depos-item col-12 col-sm-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="100%" src="https://www.youtube.com/embed/UWL3mQJNcNA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
            <div class="depos-item col-12 col-sm-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Z5k3fuyIeS8" allowfullscreen></iframe>
                </div>
            </div>
            
        </div>
    </div>

    <div class="depos-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-sm-4">
                    <img src="/site/img/depos-slogan.png" alt="Esperimenta e depois conta pra gente">
                </div>
                <div class="col-12 col-sm-4">
                    <p>Oferecer uma alimentação funcional que é sinônimo de saúde e alta gastronomia é o que nos motiva. Por isso, queremos saber como foi a sua experiência com os produtos da linha Konjac MF. Clique no botão ao lado e conta pra gente!</p>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="/blog/conta-pra-gente/" class="btn btn-roxo btn-lg btn-block" title="Conta pra gente">Conta pra gente</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //depoimentos -->

<!-- blog -->
@include('site.common.blog', ['posts' => $posts])
<!-- //blog -->
@endsection
