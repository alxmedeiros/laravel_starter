@include('layouts.partials.head')
<body class="animsition">

<div id="app">

    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
            <div class="brand">
                <img class="brand-img" src="/themes/remark/assets/images/logo-blue.png" alt="...">
                <h2 class="brand-text font-size-18">Remark</h2>
            </div>
            
            <h2>Reiniciar senha</h2>

            @if (session('status'))
                <div class="alert alert-success m-t-lg">
                    {{ session('status') }}
                </div>
            @endif
            <form method="post" role="form" action="/password/reset">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Informe seu e-mail" value="{{ $email or old('email') }}" required autofocus />
                    @if ($errors->has('email'))
                        <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Reinicar senha</button>
                </div>
            </form>
        </div>
    </div>

</div>

@include('layouts.partials.scripts')
</body>
</html>