@include('admin.layouts.partials.head')
<body class="animsition page-login-v2 layout-full page-dark">
    <div id="app">
        <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content">
                <div class="page-brand-info">
                    <div class="brand">
                        <img class="brand-img" src="/images/admin/logo@2x.png" alt="Join">
                    </div>
                    <p class="font-size-20">Bem-vindo(a) ao CMS da Konjac.</p>
                </div>
                <div class="page-login-main animation-slide-right animation-duration-1">
                    <div class="vertical-align-container">

                        <div class="brand hidden-md-up">
                            <img class="brand-img" src="/images/admin/logo@2x.png" alt="Konjac">
                        </div>
                        <h3 class="font-size-24">Entrar</h3>

                        <form method="POST" action="{{ route('admin.login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="sr-only" for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus />
                                @if ($errors->has('email'))
                                <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label class="sr-only" for="inputPassword">Senha</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                                @if ($errors->has('password'))
                                <small class="form-control-feedback">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                            <div class="form-group clearfix">
                                <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
                                    <input type="checkbox" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="rememberMe">Lembrar-me</label>
                                </div>
                                {{--<a class="float-right" href="{{ route('password.request') }}">Esqueceu a senha?</a>--}}
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </form>

                        <footer class="page-copyright">
                            <p>© 2017. TODOS OS DIREITOS RESERVADOS.</p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.partials.scripts')
</body>
</html>
