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
                    <h1><a href="#" class="logo-konjac" title="Konjac Massa MF">Konjac Massa MF</a></h1>
                </nav>
            </header>

            <!-- conteudo -->
            <main class="content-pagamento">
                <!-- page atual -->
                <div class="container-fluid">
                    <nav aria-label="breadcrumb py-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Início</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cadastro de endereço</li>
                        </ol>
                    </nav>

                <form action="{{ route('cart.address.save') }}" id="cart-form" method="post" style="padding-bottom: 40px;">
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

                    <div class="row">

                        <div class="col-lg-8">

                            @if (session('error'))
                                <div class="alert alert-danger m-t-lg">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                                        <label for="postal_code" class="control-label">CEP</label>
                                        <input id="postal_code" name="postal_code" class="form-control cep_mask" required value="{{ old('postal_code') }}" />
                                        @if ($errors->has('postal_code'))
                                            <small class="form-control-feedback">{{ $errors->first('postal_code') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="form-group{{ $errors->has('street_address') ? ' has-danger' : '' }}">
                                        <label for="street_address" class="control-label">Endereço</label>
                                        <input type="text" class="form-control" id="street_address" name="street_address" required value="{{ old('street_address') }}" />
                                        @if ($errors->has('street_address'))
                                            <small class="form-control-feedback">{{ $errors->first('street_address') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                        <label for="number" class="control-label">Número</label>
                                        <input type="text" class="form-control" id="number" name="number"  required value="{{ old('number') }}" />
                                        @if ($errors->has('number'))
                                            <small class="form-control-feedback">{{ $errors->first('number') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="street_address_complement" class="control-label">Complemento</label>
                                        <input type="text" class="form-control" id="street_address_complement" name="street_address_complement" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('district') ? ' has-danger' : '' }}">
                                        <label for="district" class="control-label">Bairro</label>
                                        <input type="text" class="form-control" id="district" name="district"  required value="{{ old('district') }}" />
                                        @if ($errors->has('district'))
                                            <small class="form-control-feedback">{{ $errors->first('district') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <estado-cidade :errors="'{{ $errors }}'" :region="'{{ old('region') }}'" :locality="'{{ old('locality') }}'"></estado-cidade>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="checkout-overlay" style="position: fixed; background: #f3f3f3; width: 100%; z-index: 9999; bottom: 0; left: 0; right: 0;">
                    	<div class="container-fluid">
                    		<div class="row">
                    			<div class="col-md-12 text-right">
	                    			<button id="btnSubmit" class="btn btn-verde2 ml-xl-4">Salvar endereço</button>
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
    <script src="/site/js/jquery.maskedinput.js"></script>

    <script>
        $(function() {

            if ( $('.cep_mask').length > 0 ) {
                $('.cep_mask').mask('99999-999');
            }

            $(document).on('onsubmit', '#cart-form', function(e) {
                console.log('btnSubmit');
            });
        });
    </script>

</body>
</html>