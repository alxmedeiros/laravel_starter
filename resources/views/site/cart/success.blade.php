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
    <script src="https://use.fontawesome.com/48a49c1e18.js"></script>

    <script src="https://cdn.ravenjs.com/3.25.2/raven.min.js" crossorigin="anonymous"></script>
    <script>
        Raven.config('https://d30d7c889ee84222aa3237747edaa68c@sentry.io/1212029').install()
    </script>

    <style>
        /*
         * Globals
         */
        /* Links */
        a,
        a:focus,
        a:hover {
            color: #333;
        }

        /*
         * Base structure
         */

        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            color: #333;
        }

        .cover-container {
            max-width: 42em;
        }


        /*
         * Header
         */
        .masthead {
            margin-bottom: 2rem;
        }

        .masthead-brand {
            margin-bottom: 0;
        }

        .nav-masthead .nav-link {
            padding: .25rem 0;
            font-weight: 700;
            color: rgba(255, 255, 255, .5);
            background-color: transparent;
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: rgba(255, 255, 255, .25);
        }

        .nav-masthead .nav-link + .nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #fff;
            border-bottom-color: #fff;
        }

        @media (min-width: 48em) {
            .masthead-brand {
                float: left;
            }
            .nav-masthead {
                float: right;
            }
        }


        /*
         * Cover
         */
        .cover {
            padding: 0 1.5rem;
        }
        .cover .btn-lg {
            padding: .75rem 1.25rem;
            font-weight: 700;
        }


        /*
         * Footer
         */
        .mastfoot {
            color: rgba(255, 255, 255, .5);
        }

        .icon {
            font-size: 70px;
            text-align: center;
            margin: 50px auto 25px auto;
        }
    </style>
</head>
<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">Você está utilizando um navegador <strong>desatualizado</strong>. Favor <a href="https://browsehappy.com/?locale=pt-br">atualizar seu navegador</a> para melhorar sua experiência.</p>
    <![endif]-->

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <div id="principal" class="p-5">
            <!-- topo -->
            <header id="topo-pagamento" class="masthead mb-auto">
                <div class="inner">
                    <h1 class="text-center"><a href="http://www.konjacmassamf.com" class="logo-konjac mx-auto" title="Konjac Massa MF">Konjac Massa MF</a></h1>
                </div>
            </header>

            <!-- conteudo -->
            <main class="content-pagamento">

                <div class="icon"><i class="fa fa-check-circle-o fa-4 text-success"></i></div>

                <p class="lead text-center">Compra Efetuada</p>
                <p class="lead text-center">Aguarde a confirmação de pagamento.</p>
                <p class="lead text-center">
                    <a href="/" class="btn btn-lg btn-secondary">Volte para o site</a>
                </p>
            </main>
            <!-- //conteudo -->

        </div>

    </div>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{ asset('js/site.js') }}"></script>

</body>
</html>