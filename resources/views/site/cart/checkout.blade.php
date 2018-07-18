<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Konjac Massa MF</title>

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
        <div id="principal">
            <!-- topo -->
            <header id="topo-pagamento">
                <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
                    <h1><a href="http://www.konjacmassamf.com" class="logo-konjac" title="Konjac Massa MF">Konjac Massa MF</a></h1>
                </nav>
            </header>

            <!-- conteudo -->
            <main class="content-pagamento">
                <!-- page atual -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb py-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Início</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Finalizar compra</li>
                        </ol>
                    </nav>

                <form action="{{ route('cart.processCheckout') }}" id="cart-form" method="post" style="padding-bottom: 40px;">
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

                    <checkout-cart :cart-items="{{ $cartItems }}" :customer="{{ $customer }}"></checkout-cart>

                    <div class="checkout-overlay" style="position: fixed; background: #f3f3f3; width: 100%; z-index: 9999; bottom: 0; left: 0; right: 0;">
                    	<div class="container-fluid">
                    		<div class="row">
                    			<div class="col-md-12 text-right">
                                    <small id="processing" class="m-r-md d-none">Aguarde, estamos redicionando você para o pagamento...</small>
	                    			<button id="btnSubmit" class="btn btn-verde2 ml-xl-4">Finalizar compra</button>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    
                </form>
                </div>

            </main>
            <!-- //conteudo -->

            <!-- footer -->
            <footer class="text-center py-3"><small>Konjac Massa MF</small></footer>
            <!-- //footer -->
        </div>

    </div>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{ asset('js/site.js') }}"></script>

    <script>
        $(function() {
            $(document).on('click', '#btnSubmit', function(e) {

                var el = $(this);

                el.prop('disabled', true);

                $('#processing').removeClass('d-none');

                // console.log('btnSubmit')

                $('#cart-form').submit();

            });
        });
    </script>

</body>
</html>