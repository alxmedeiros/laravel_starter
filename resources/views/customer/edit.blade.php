@extends('customer.layouts.app')

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title font-size-26 font-weight-100">Editar meus dados</h1>
        </div>
        <div class="page-content">

            <div class="panel">

                <form action="{{ route('customer.update') }}" id="cart-form" method="post" style="padding-bottom: 40px;">
                    {{ method_field('PUT') }}
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

                    <div class="panel-body container-fluid">

                        <div class="row">

                            <div class="col-lg-8">

                            @if (session('error'))
                                <div class="alert alert-danger m-t-lg">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success m-t-lg">
                                    {{ session('success') }}
                                </div>
                            @endif

                                <div class="row">
                                    <div class="form-group col-md-4{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                        <label for="first_name" class="control-label">Nome</label>
                                        <div>
                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', isset($row) ? $row->first_name : '') }}" data-fv-notempty />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                        <label for="last_name" class="control-label">Último nome</label>
                                        <div>
                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', isset($row) ? $row->last_name : '') }}" data-fv-notempty />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4"{{ $errors->has('email') ? ' has-danger' : '' }}>
                                        <label for="email" class="control-label">E-mail</label>
                                        <div>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', isset($row) ? $row->email : '') }}" data-fv-notempty />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4{{ $errors->has('national_id') ? ' has-danger' : '' }}">
                                        <label for="national_id" class="control-label">CPF</label>
                                        <div>
                                            <input type="text" id="national_id" name="national_id" class="form-control cpf_mask" value="{{ old('national_id', isset($row) ? $row->national_id : '') }}" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-4{{ $errors->has('gender') ? ' has-danger' : '' }}">
                                        <label for="gender" class="control-label">Sexo {{ $row->gender }}</label>
                                        <div>
                                            <select name="gender" id="gender" class="form-control" value="{{ old('gender', isset($row) ? $row->gender : '') }}">
                                                <option value="">Selecione</option>
                                                <option value="male" {{ $row->gender=='male'?'selected':'' }}>Masculino</option>
                                                <option value="female" {{ $row->gender=='female'?'selected':'' }}>Feminino</option>
                                                <option value="not_defined" {{ $row->gender=='not_defined'?'selected':'' }}>Não definido</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <label for="phone" class="control-label">Telefone</label>
                                        <div>
                                            <input type="tel" id="phone" name="phone" class="form-control fone_mask"  value="{{ old('phone', isset($row) ? $row->phone : '') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4{{ $errors->has('cellphone') ? ' has-danger' : '' }}">
                                        <label for="cellphone" class="control-label">Celular</label>
                                        <div>
                                            <input type="tel" id="cellphone" name="cellphone" class="form-control fone_mask" value="{{ old('cellphone', isset($row) ? $row->cellphone : '') }}" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button id="btnSubmit" class="btn btn-verde2 ml-xl-4">Salvar endereço</button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>

@endsection