@include('layouts.partials.head')
<body class="animsition page-login-v3 layout-full">
<div id="app">

    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">

            <div class="panel">
                <div class="panel-heading">
                    Seu cadastro foi verificado com sucesso.
                </div>
                <div class="panel-body">
                    <a href="{{url('/login')}}">Clique aqui</a> para entrar.
                </div>
            </div>

            <footer class="page-copyright page-copyright-inverse">
                <p>© 2017. TODOS OS DIREITOS RESERVADOS.</p>
            </footer>

        </div>
    </div>
</div>
@include('layouts.partials.scripts')
</body>
</html>
