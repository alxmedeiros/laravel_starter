@extends('site.common.layout')

@section('content')

    <!-- sacola -->
    <section class="sacola">
        <header class="titulos-area">
            <div class="container">
                <h1 class="titulos-page">Sacola de compras</h1>
                <!-- page atual -->
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Página principal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sacola de compras</li>
                    </ol>
                </nav>
            </div>
        </header>


        <form action="{{ route('cart.checkout') }}" id="cart-form" method="post">
            {{ csrf_field() }}
            @if( $errors->any() )
            <div class="errors">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger text-center">
                                <p style="margin-bottom: 0;">{{ $errors->first() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <cart-items-table :cart-items="'{{ $cartItems }}'"></cart-items-table>

        </form>

    </section>
    <!-- //sacola -->

@endsection