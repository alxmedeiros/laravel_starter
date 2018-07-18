@extends('site.common.layout')

@section('content')

    <!-- sobre-->
    <section class="sobre">

        @include('site.common.page-header', ['title' => 'Sobre a Conjak Massa MF', 'breadcrumb' => 'Sobre'])

        <div class="container mb-sm-5">
            <div class="row">
                <div class="col-12 col-sm-10 mx-sm-auto order-2 order-sm-2 col-lg-6">
                    {!! $page->post_content !!}
                </div>
                <div class="col col-sm-10 my-4 mx-sm-auto col-lg-6 order-lg-2 text-center">
                    <img src="/site/img/produtos.jpg" class="d-inline-block" alt="">
                </div>
            </div>
        </div>

        <!-- descricao -->
        <div class="sobre-info">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9 col-lg-8 mr-auto">
                        <h3 class="sobre-frase mt-lg-5">“Com a linha de produtos Konjac Massa MF nunca foi tão fácil manter uma alimentação saudável de baixo teor calórico, emagrecer de forma natural e saudável,e ao mesmo tempo poder desfrutar de refeições saborosas como lasanha, espaguete, arroz, risotos, entre outras massas, a qualquer momento. E principalmente sem comprometer a dieta. Fácil, prático e delicioso”.</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- valor nutricional -->
    @include('site.common.valor-nutricional')
    <!-- //valor nutricional -->

    </section>
    <!-- //sobre-->

@endsection
