@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="panel">
        <header class="panel-heading d-flex justify-content-between align-items-center">
            <h3 class="panel-title pull-left px-6">Dados cadastrais</h3>
        </header>

        <div class="panel-body container-fluid">

            <form class="form-validate" method="post"
                      action="{{ isset($id)?route('administradores.update', ['id' => $id]):route('administradores.store') }}">
                    {{ isset($id)?method_field('PUT'):'' }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group col-md-6{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="control-label" for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name', isset($row) ? $row->name : '') }}" data-fv-notempty>
                            @if ($errors->has('name'))
                                <small class="form-control-feedback">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label class="control-label" for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email', isset($row) ? $row->email : '') }}" data-fv-notempty data-fv-emailaddress>
                            @if ($errors->has('email'))
                                <small class="form-control-feedback">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3{{ $errors->has('profile') ? ' has-danger' : '' }}">
                            <label class="control-label" for="profile">Nível</label>
                            <div>
                                <select name="profile" id="profile" class="form-control">
                                    <option value="geral" {{ old('profile', isset($row)?($row->profile=='geral'?'selected':''):'') }}>Geral</option>
                                    <option value="normal" {{ old('profile', isset($row)?($row->profile=='normal'?'selected':''):'') }}>Normal</option>
                                    <option value="outro" {{ old('profile', isset($row)?($row->profile=='outro'?'selected':''):'') }}>Outro</option>
                                </select>
                                @if ($errors->has('profile'))
                                <small class="form-control-feedback">{{ $errors->first('profile') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-3{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label class="control-label" for="password">Senha</label>
                            <div>
                                <input type="password" class="form-control" id="password" name="password" {{ !isset($id)?'required':'' }}>
                                @if ($errors->has('password'))
                                    <small class="form-control-feedback">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label" for="password-confirm">Confirme a senha</label>
                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" {{ !isset($id)?'required':'' }}>
                            </div>
                        </div>
                        <div class="form-group col-md-3{{ $errors->has('status') ? ' has-danger' : '' }}">
                            <label class="control-label" for="status">Status</label>
                            <div>
                                <select name="status" id="status" class="form-control">
                                    <option value="active">Ativo</option>
                                    <option value="inactive">Inativo</option>
                                </select>
                                @if ($errors->has('status'))
                                    <small class="form-control-feedback">{{ $errors->first('status') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button name="save" type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>

        </div>
    </div>
</div>
@endsection