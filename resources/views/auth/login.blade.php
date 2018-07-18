@include('layouts.partials.head')
<body class="animsition page-login-v3 layout-full">
    <div id="app">

        <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">

                <div class="panel">
                    <div class="panel-body">
                        <div class="brand">
                            <img class="brand-img" src="/themes/remark/assets/images/logo-blue.png" alt="...">
                            <h2 class="brand-text font-size-18">Remark</h2>
                        </div>

                        <form method="post" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            @if (session('account_verified'))
                                <div class="alert alert-success m-t-lg">
                                    {{ session('account_verified') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success m-t-lg">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger m-t-lg">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} form-material floating" data-plugin="formMaterial">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                                <label class="floating-label">Email</label>
                                @if ($errors->has('email'))
                                    <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} form-material floating" data-plugin="formMaterial">
                                <input type="password" class="form-control" name="password" required />
                                <label class="floating-label">Password</label>
                                @if ($errors->has('password'))
                                    <small class="form-control-feedback">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                            <div class="form-group clearfix">
                                <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                                    <input type="checkbox" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="rememberMe">Lembrar-me</label>
                                </div>
                                <a class="float-right" href="{{ route('password.request') }}">Esqueceu a senha?</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Entrar</button>
                        </form>
                        {{--<p>Não possui conta? <a href="{{ route('register') }}"><strong>Clique aqui</strong></a> e faça a sua.</p>--}}
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
