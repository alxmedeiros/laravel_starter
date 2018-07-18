@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="panel">
        <form class="form-validate" method="post"
              action="{{ isset($id)?route('clientes.update', ['id' => $id]):route('clientes.store') }}">
            {{ isset($id)?method_field('PUT'):'' }}
            {{ csrf_field() }}

            <header class="panel-heading d-flex justify-content-between align-items-center">
                <h3 class="panel-title pull-left px-6">Dados cadastrais</h3>
            </header>

            <div class="panel-body container-fluid">

                {{--<div class="row">--}}
                    {{--<div class="form-group col-md-3">--}}
                        {{--<label for="type" class="control-label">Tipo</label>--}}
                        {{--<select name="type" id="type" class="form-control" v-model="type" v-bind:type="'{{ old('type', isset($row) ? $row->type : '') }}'">--}}
                            {{--<option value="">Selecione</option>--}}
                            {{--<option value="pf" {{ old('type', isset($row) ? $row->type==='pf' : '') }}>Pessoa Física</option>--}}
                            {{--<option value="pj" {{ old('type', isset($row) ? $row->type==='pj' : '') }}>Pessoa Jurídica</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

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
                    <div v-if="type === 'pj'" class="form-group col-md-4{{ $errors->has('company_name') ? ' has-danger' : '' }}">
                        <label for="company_name" class="control-label">Razão Social</label>
                        <div>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', isset($row) ? $row->company_name : '') }}" data-fv-notempty />
                        </div>
                    </div>
                    <div v-if="type === 'pj'" class="form-group col-md-4{{ $errors->has('business_name') ? ' has-danger' : '' }}">
                        <label for="business_name" class="control-label">Nome Fantasia</label>
                        <div>
                            <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old('business_name', isset($row) ? $row->business_name : '') }}" data-fv-notempty />
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
                            <input type="text" id="national_id" name="national_id" class="form-control" value="{{ old('national_id', isset($row) ? $row->national_id : '') }}" v-mask="'###.###.###-##'" data-fv-notempty />
                        </div>
                    </div>
                    <div v-if="type === 'pj'" class="form-group col-md-4{{ $errors->has('national_id') ? ' has-danger' : '' }}">
                        <label for="national_id" class="control-label">CNPJ</label>
                        <div>
                            <input type="text" id="national_id" name="national_id" class="form-control" value="{{ old('national_id', isset($row) ? $row->national_id : '') }}" v-mask="'##.###.###/####-##'" data-fv-notempty />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!--
                    <div class="form-group col-md-4{{ $errors->has('birthday') ? ' has-danger' : '' }}">
                        <label for="birthday" class="control-label">Data de nascimento</label>
                        <div>
                            <input type="text" id="birthday" name="birthday" class="form-control" value="{{ old('birthday', isset($row) ? $row->birthday : '') }}" />
                        </div>
                    </div>
                    -->
                    <div class="form-group col-md-4{{ $errors->has('gender') ? ' has-danger' : '' }}">
                        <label for="gender" class="control-label">Sexo</label>
                        <div>
                            <select name="gender" id="gender" class="form-control" value="{{ old('gender', isset($row) ? $row->gender : '') }}">
                                <option value="">Selecione</option>
                                <option value="male">Masculino</option>
                                <option value="female">Feminino</option>
                                <option value="not_defined">Não definido</option>
                            </select>
                        </div>
                    </div>
                        <div class="form-group col-md-4{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <label for="phone" class="control-label">Telefone</label>
                            <div>
                                <input type="tel" id="phone" name="phone" class="form-control"  value="{{ old('phone', isset($row) ? $row->phone : '') }}" v-mask="['(##) ####-####', '(##) #####-####']" />
                            </div>
                        </div>
                        <div class="form-group col-md-4{{ $errors->has('cellphone') ? ' has-danger' : '' }}">
                            <label for="cellphone" class="control-label">Celular</label>
                            <div>
                                <input type="tel" id="cellphone" name="cellphone" class="form-control" value="{{ old('cellphone', isset($row) ? $row->cellphone : '') }}" v-mask="['(##) ####-####', '(##) #####-####']" />
                            </div>
                        </div>
                </div>

                {{--<div class="row" v-if="type !== ''">--}}
                    {{--<div class="form-group col-md-4{{ $errors->has('business_phone') ? ' has-danger' : '' }}">--}}
                        {{--<label for="business_phone" class="control-label">Telefone Comercial</label>--}}
                        {{--<div>--}}
                            {{--<input type="tel" id="business_phone" name="business_phone" class="form-control" value="{{ old('business_phone', isset($row) ? $row->business_phone : '') }}" v-mask="['(##) ####-####', '(##) #####-####']" />--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    <button name="save" type="submit" class="btn btn-primary">Salvar</button>
                </div>

            </div>

            <!--
            <header class="panel-heading d-flex justify-content-between align-items-center">
                <h3 class="panel-title pull-left px-6">Dados de endereço</h3>
            </header>

            <div class="panel-body container-fluid">

                <div class="row">
                    <div class="form-group col-md-2{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                        <label for="postal_code" class="control-label">CEP</label>
                        <div>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', isset($row) ? $row->postal_code : '') }}" data-fv-notempty />
                        </div>
                    </div>
                    <div class="form-group col-md-7{{ $errors->has('street_address') ? ' has-danger' : '' }}">
                        <label for="street_address" class="control-label">Endereço</label>
                        <div>
                            <input type="text" class="form-control" id="street_address" name="street_address" value="{{ old('street_address', isset($row) ? $row->street_address : '') }}" data-fv-notempty />
                        </div>
                    </div>
                    <div class="form-group col-md-3"{{ $errors->has('number') ? ' has-danger' : '' }}>
                        <label for="number" class="control-label">Número</label>
                        <div>
                            <input type="text" class="form-control" id="number" name="number" value="{{ old('number', isset($row) ? $row->number : '') }}" data-fv-notempty />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12{{ $errors->has('street_address_complement') ? ' has-danger' : '' }}">
                        <label for="street_address_complement" class="control-label">Complemento</label>
                        <div>
                            <input type="text" id="street_address_complement" name="street_address_complement" class="form-control" value="{{ old('street_address_complement', isset($row) ? $row->street_address_complement : '') }}" data-fv-notempty />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4{{ $errors->has('district') ? ' has-danger' : '' }}">
                        <label for="district" class="control-label">Bairro</label>
                        <div>
                            <input type="tel" id="district" name="district" class="form-control"  value="{{ old('district', isset($row) ? $row->district : '') }}" />
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('region') ? ' has-danger' : '' }}">
                        <label for="region" class="control-label">Estado</label>
                        <div>
                            <select name="region" id="region" class="form-control">
                                <option value="">Selecione</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('locality') ? ' has-danger' : '' }}">
                        <label for="locality" class="control-label">Cidade</label>
                        <div>
                            <select name="locality" id="locality" class="form-control">
                                <option value="">Selecione</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button name="save" type="submit" class="btn btn-primary">Salvar</button>
                </div>

            </div>
            -->

        </form>


    </div>
</div>
@endsection