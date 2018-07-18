@extends('site.common.layout')

@section('content')
    <!-- produtos -->
    <section class="produtos">
        <header class="titulos-area card text-white">
            <div class="container">
                <h1 class="titulos-page">Produtos</h1>
                <!-- page atual -->
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página principal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Produtos</li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="container">
            <div class="row py-5">
            @foreach($products as $product)
                <div class="produtos-item col-12 col-sm-4">
                    <a href="{{ route('site.product.detail', ['product_slug' => $product->sku]) }}" title="">
                        <img src="{{ $product->getThumbnailFiltered() }}" alt="">
                        <h2 class="produtos-item-titulo">
                            {{ $product->short_name }} <span>Konjac Massa</span>
                        </h2>
                        <p class="produtos-item-valor"><sub>R$</sub> {{ $product->price }}</p>
                        <small class="frete">FRETE GRÁTIS</small>
                    </a>
                    <a href="{{ route('site.product.detail', ['product_slug' => $product->sku]) }}" class="btn btn-roxo" title="">Comprar</a>
                </div>
            @endforeach
            </div>
        </div>

    </section>
    <!-- //produtos -->
@endsection