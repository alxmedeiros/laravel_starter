@extends('site.common.layout')

@section('content')

    <!-- produto -->
    <section class="produtos">
        <header class="titulos-area card text-white">
            <div class="container">
                <h1 class="titulos-page">{{ $product->name }}</h1>
                <!-- page atual -->
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página principal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Produtos</li>
                    </ol>
                </nav>
            </div>
        </header>

        <div class="produto-content parallax" data-speed="15" style="background-image:url('{{ $product->cover }}');">
            <div class="container">
                <div class="row">
                    <div class="col-7 col-sm-4 col-lg-3 mx-auto mx-sm-0">
                        <figure class="produto-img">
                            <img src="{{ $product->thumbnail }}" alt="" />
                        </figure>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 mt-sm-5 pt-sm-5">
                        <h2 class="produto-valor"><sub>R$</sub> {{ $product->price }}</h2>
                        @if ( $product->min_amount > 0 )
                        <p>Quantidade mínima de compra de <b>{{ $product->min_amount }} unidades iguais ou mix</b> de qualquer produto</p>
                        @endif
                        <h5 class="produto-subtitulo">Quantidade</h5>
                        Parcele suas compras em até <b>2x sem juros</b>
                        <div class="produto-qnt form-inline mb-2 mb-sm-1">
                            <form method="post" action="{{ route('cart.add') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="product" value="{{ $product->id }}" />
                                <div class="form-group">
                                    <label for="quantidade" class="sr-only">Quantidade</label>
                                    <input type="text" class="form-control" id="quantidade" name="amount" value="{{ $product->min_amount }}" />
                                </div>
                                <button type="submit" class="btn btn-verde2 mx-0">Comprar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="produto-info" style="background-image:url('{{ $product->background }}');">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 py-4 py-sm-5">
                        <h2>Massa alimentícia Konjac Massa MF</h2>
                        <p>A Konjac Massa MF é a alternativa ideal para as pessoas que desejam seguir uma alimentação saudável e desfrutar de uma saborosa refeição à base de massas e arroz. O novo conceito de alimentação funcional onde é possível comer bem e saciar a fome sem engordar, de baixo teor calórico: 9 calorias em cada 100g, 0g de hidratos de carbono, 0g sódio, 0g de gordura, NÃO CONTÉM GLÚTEN, NÃO CONTÉM LACTOSE, e com 8g de fibra Natural (glucomanano). Alimento 100% ORGÂNICO DE ORIGEM VEGETAL.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="produto-desc">
            <div class="container">
                <div class="row">
                    <div class="col">
                        {!! $product->description !!}
                    </div>

                    <div class="col">
                        <h2>Tabela Nutricional</h2>
                        <p>Tabela comparativa referente a 100 gramas de massa sem molho</p>

                        <table class="produto-info-table table table-sm table-striped">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Quantidade por porção</th>
                                <th scope="col">%VD (*)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" data-th="">Valor Energético</th>
                                <td data-th="Quantidade por porção">9 Kcal = 32 KJ</td>
                                <td data-th="%VD (*)">0%</td>
                            </tr>
                            <tr>
                                <th scope="row" data-th="">Carboidratos</th>
                                <td data-th="Quantidade por porção">0g</td>
                                <td data-th="%VD (*)">0%</td>
                            </tr>
                            <tr>
                                <th scope="row" data-th="">Açúcares</th>
                                <td data-th="Quantidade por porção">0g</td>
                                <td data-th="%VD (*)">0%</td>
                            </tr>
                            <tr>
                                <th scope="row" data-th="">Proteínas</th>
                                <td data-th="Quantidade por porção">0.2g</td>
                                <td data-th="%VD (*)">0%</td>
                            </tr>
                            <tr>
                                <th scope="row" data-th="">Gorduras Totais</th>
                                <td data-th="Quantidade por porção">0g</td>
                                <td data-th="%VD (*)">0%</td>
                            </tr>
                            <tr>
                                <th scope="row" data-th="">Gorduras Saturadas</th>
                                <td data-th="Quantidade por porção">0g</td>
                                <td data-th="%VD (*)">0%</td>
                            </tr>
                            <tr>
                                <th scope="row" data-th="">Gorduras Trans</th>
                                <td data-th="Quantidade por porção">0g</td>
                                <td data-th="%VD (*)">(**)</td>
                            </tr>
                            <tr>
                                <th scope="row" data-th="">Fibra Alimentar</th>
                                <td data-th="Quantidade por porção">4g</td>
                                <td data-th="%VD (*)">16%</td>
                            </tr>
                            <tr>
                                <th scope="row" data-th="">Sódio</th>
                                <td data-th="Quantidade por porção">0g</td>
                                <td data-th="%VD (*)">0%</td>
                            </tr>
                            </tbody>
                        </table>
                        <p class="small">(*) *% valor diáro com base em uma dieta de 2.000kcal ou 8.400kj. Seus valores diários podem ser maiores ou menores dependendo de suas necessidades energéticas.</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- valor nutricional -->
        <div class="produto-valnut ">
            <div class="container">
                <h2 class="produto-info-titulo">Valor Nutricional</h2>
                <p>Valor nutricional por cada 100 gramas</p>
                <div class="d-sm-flex align-items-sm-end justify-content-sm-center">
                    <div class="produto-valnut-item">
                        <p>caloria <span>0</span> <sub>Kcal</sub></p>
                    </div>
                    <div class="produto-valnut-item">
                        <p>carboidrato <span>0</span> <sub>g</sub></p>
                    </div>
                    <div class="produto-valnut-item">
                        <p>açucares <span>0</span> <sub>g</sub></p>
                    </div>
                    <div class="produto-valnut-item">
                        <p>proteínas <span>0,2</span> <sub>g</sub></p>
                    </div>
                    <div class="produto-valnut-item">
                        <p>gorduras saturadas <span>0</span> <sub>g</sub></p>
                    </div>
                    <div class="produto-valnut-item">
                        <p>gorduras trans <span>0</span> <sub>g</sub></p>
                    </div>
                    <div class="produto-valnut-item">
                        <p>fibra alimentar <span>4</span> <sub>g</sub></p>
                    </div>
                    <div class="produto-valnut-item">
                        <p>caloria <span>0</span> <sub>mg</sub></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- //valor nutricional -->

        <div class="produto-preparo">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 mx-auto">
                        <h2>Modo de Preparo</h2>
                        <ol>
                            <li>Abra o lacre da embalagem, em seguida retire a água que vem na massa. Ao abrir o pacote, pode notar um suave aroma que desaparece ao lavar.</li>
                            <li>Lavar em água limpa por 15 segundos para retirar o aroma, reserve a  massa em um recipiente. A Konjac Massa MF vem pronto para consumo.</li>
                            <li>Crie seu próprio molho ou outros preparos a sua escolha.</li>
                            <li>Adicione a Konjac Massa MF ao Preparo. Esquentar em fogo baixo durante 3-5 min. ou no forno micro-ondas por 1-2min. para que o produto absorva bem o sabor do molho e todos os ingreditens que foram acrescentados ao preparo.</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- //produto -->

    <!-- blog -->
    @include('site.common.blog')
    <!-- //blog -->
@endsection
