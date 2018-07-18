@include('layouts.partials.head')
<body class="animsition">

    <div id="app">

        <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
                <div class="brand">
                    <img class="brand-img" src="/themes/remark/assets/images/logo-blue.png" alt="...">
                    <h2 class="brand-text font-size-18">Remark</h2>
                </div>

                <h2>Esqueceu a senha?</h2>
                <p>Informe seu email de registro para reset sua senha</p>
                @if (session('status'))
                    <div class="alert alert-success m-t-lg">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="post" role="form" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Informe seu e-mail" value="{{ old('email') }}" />
                        @if ($errors->has('email'))
                            <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Envie para meu email</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    @include('layouts.partials.scripts')
</body>
</html>