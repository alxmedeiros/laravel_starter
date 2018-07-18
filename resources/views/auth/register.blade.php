@include('layouts.partials.head')
<body class="animsition page-register-v3 layout-full">
    <div id="app">
        <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">

                <div class="panel">
                    <div class="panel-body">
                        <div class="brand">
                            <img class="brand-img" src="/themes/remark/assets/images/logo-blue.png" alt="...">
                            <h2 class="brand-text font-size-18">Remark</h2>
                        </div>

                        <form method="post" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-left form-group{{ $errors->has('first_name') ? ' has-danger' : '' }} form-material" data-plugin="formMaterial">
                                        <label class="form-control-label">Nome</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required />
                                        @if ($errors->has('first_name'))
                                            <small class="form-control-feedback">{{ $errors->first('first_name') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-left form-group{{ $errors->has('last_name') ? ' has-danger' : '' }} form-material" data-plugin="formMaterial">
                                        <label class="form-control-label">Sobrenome</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required />
                                        @if ($errors->has('last_name'))
                                            <small class="form-control-feedback">{{ $errors->first('last_name') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-left form-group{{ $errors->has('email') ? ' has-danger' : '' }} form-material" data-plugin="formMaterial">
                                        <label class="form-control-label">E-mail</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                                        @if ($errors->has('email'))
                                            <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-left form-group{{ $errors->has('national_id') ? ' has-danger' : '' }} form-material" data-plugin="formMaterial">
                                        <label class="form-control-label">CPF</label>
                                        <input type="text" class="form-control cpf_mask" name="national_id" value="{{ old('national_id') }}" required />
                                        @if ($errors->has('national_id'))
                                            <small class="form-control-feedback">{{ $errors->first('national_id') }}</small>
                                        @endif
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-left form-group{{ $errors->has('phone') ? ' has-danger' : '' }} form-material" data-plugin="formMaterial">
                                        <label class="form-control-label">Telefone</label>
                                        <input type="tel" class="form-control fone_mask" name="phone" value="{{ old('phone') }}" />
                                        @if ($errors->has('phone'))
                                            <small class="form-control-feedback">{{ $errors->first('phone') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="text-left form-group{{ $errors->has('password') ? ' has-danger' : '' }} form-material" data-plugin="formMaterial">
                                        <label class="form-control-label">Senha</label>
                                        <input type="password" class="form-control" name="password" required />
                                        @if ($errors->has('password'))
                                            <small class="form-control-feedback">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="text-left form-group form-material" data-plugin="formMaterial">
                                        <label class="form-control-label">Confirme a senha</label>
                                        <input type="password" class="form-control" name="password_confirmation" required />
                                    </div>

                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Cadastrar</button>
                        </form>
                        <p>Já possui conta? <a href="{{ route('login') }}"><strong>Clique aqui</strong></a> e faça a seu login.</p>
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