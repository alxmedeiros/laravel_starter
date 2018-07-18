@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="panel">
        <form class="form-validate" method="post"
              action="{{ isset($id)?route('empresas.update', ['id' => $id]):route('empresas.store') }}">
            {{ isset($id)?method_field('PUT'):'' }}
            {{ csrf_field() }}

            <header class="panel-heading d-flex justify-content-between align-items-center">
                <h3 class="panel-title pull-left px-6">Dados cadastrais</h3>
            </header>

            <div class="panel-body container-fluid">

                @isset( $row )
                <div class="row">
                    <div class="col-md-12 text-right">
                @if( $row->status == 'inactive' )
                        <a href="{{ route('empresas.activate', ['id' => $row->id]) }}" class="btn btn-primary" title="Ativar">
                            Ativar
                        </a>
                @else
                        <span class="badge badge-success">Empresa ativa</span>
                @endif
                    </div>
                </div>
                @endisset

                <div class="row">
                    <div class="form-group col-md-4{{ $errors->has('company_name') ? ' has-danger' : '' }}">
                        <label for="company_name" class="control-label">Razão Social</label>
                        <div>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', isset($row) ? $row->company_name : '') }}" data-fv-notempty />
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('business_name') ? ' has-danger' : '' }}">
                        <label for="business_name" class="control-label">Nome Fantasia</label>
                        <div>
                            <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old('business_name', isset($row) ? $row->business_name : '') }}" data-fv-notempty />
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('national_id') ? ' has-danger' : '' }}">
                        <label for="national_id" class="control-label">CNPJ</label>
                        <div>
                            <input type="text" id="national_id" name="national_id" class="form-control cnpj_mask" value="{{ old('national_id', isset($row) ? $row->national_id : '') }}"data-fv-notempty />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4"{{ $errors->has('email') ? ' has-danger' : '' }}>
                        <label for="email" class="control-label">E-mail</label>
                        <div>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', isset($row) ? $row->email : '') }}" data-fv-notempty />
                        </div>
                    </div>

                    <div class="form-group col-md-4{{ $errors->has('opening_date') ? ' has-danger' : '' }}">
                        <label for="opening_date" class="control-label">Data de abertura</label>
                        <div>
                            <input type="text" id="opening_date" name="opening_date" class="form-control date_mask" value="{{ old('opening_date', isset($row) ? $row->opening_date : '') }}" />
                        </div>
                    </div>

                    <div class="form-group col-md-4{{ $errors->has('state_registration') ? ' has-danger' : '' }}">
                        <label for="state_registration" class="control-label">Insc. Estadual</label>
                        <div>
                            <input type="text" id="state_registration" name="state_registration" class="form-control" value="{{ old('state_registration', isset($row) ? $row->state_registration : '') }}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4{{ $errors->has('cellphone') ? ' has-danger' : '' }}">
                        <label for="cellphone" class="control-label">Celular</label>
                        <div>
                            <input type="tel" id="cellphone" name="cellphone" class="form-control fone_mask" value="{{ old('cellphone', isset($row) ? $row->cellphone : '') }}" />
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('business_phone') ? ' has-danger' : '' }}">
                        <label for="business_phone" class="control-label">Telefone Comercial</label>
                        <div>
                            <input type="tel" id="business_phone" name="business_phone" class="form-control fone_mask" value="{{ old('business_phone', isset($row) ? $row->business_phone : '') }}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3{{ $errors->has('base_price') ? ' has-danger' : '' }}">
                        <label for="base_price" class="control-label">Preço base</label>
                        <div>
                            <input type="text" class="form-control" id="base_price" name="base_price" v-money="money" value="{{ old('base_price', isset($row) ? $row->base_price : '') }}" data-fv-notempty />
                            @if ($errors->has('base_price'))
                                <small class="form-control-feedback">{{ $errors->first('base_price') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-3{{ $errors->has('min_amount') ? ' has-danger' : '' }}">
                        <label for="min_amount" class="control-label">Compra miníma</label>
                        <div>
                            <input type="text" class="form-control" id="min_amount" name="min_amount" v-money="money" value="{{ old('min_amount', isset($row) ? $row->min_amount : '') }}" data-fv-notempty />
                            @if ($errors->has('min_amount'))
                                <small class="form-control-feedback">{{ $errors->first('min_amount') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-3{{ $errors->has('max_amount') ? ' has-danger' : '' }}">
                        <label for="max_amount" class="control-label">Compra máxima</label>
                        <div>
                            <input type="text" class="form-control" id="max_amount" name="max_amount" v-money="money" value="{{ old('max_amount', isset($row) ? $row->max_amount : '') }}" data-fv-notempty />
                            @if ($errors->has('max_amount'))
                                <small class="form-control-feedback">{{ $errors->first('max_amount') }}</small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6{{ $errors->has('message') ? ' has-danger' : '' }}">
                        <label for="message" class="control-label">Mensagem</label>
                        <div>
                            <textarea class="form-control" id="message" name="message" rows="8">
                                {{ old('message', isset($row) ? $row->message : '') }}
                            </textarea>
                            @if ($errors->has('message'))
                                <small class="form-control-feedback">{{ $errors->first('message') }}</small>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <header class="panel-heading d-flex justify-content-between align-items-center">
                <h3 class="panel-title pull-left px-6">Dados de Endereço</h3>
            </header>

            <div class="panel-body container-fluid">

                <address-fields :address="{{ (isset($row) && count($row->addresses) > 0)?$row->addresses[0]:"''" }}"></address-fields>

            </div>

            <header class="panel-heading d-flex justify-content-between align-items-center">
                <h3 class="panel-title pull-left px-6">Dados do Representante Legal</h3>
            </header>

            <div class="panel-body container-fluid">

                <div class="row">
                    <div class="form-group col-md-4{{ $errors->has('agent[first_name]') ? ' has-danger' : '' }}">
                        <label for="agent_first_name" class="control-label">Nome</label>
                        <div>
                            <input type="text" class="form-control" id="agent_first_name" name="agent[first_name]" value="{{ old('agent[first_name]', isset($row) ? (isset($row->Agents[0])?$row->Agents[0]['first_name']:'') : '') }}" data-fv-notempty />
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('agent[last_name]') ? ' has-danger' : '' }}">
                        <label for="agent_last_name" class="control-label">Último nome</label>
                        <div>
                            <input type="text" class="form-control" id="agent_last_name" name="agent[last_name]" value="{{ old('agent[last_name]', isset($row) ? (isset($row->Agents[0])?$row->Agents[0]['last_name']:'') : '') }}" data-fv-notempty />
                        </div>
                    </div>
                    <div class="form-group col-md-4"{{ $errors->has('agent[email]') ? ' has-danger' : '' }}>
                        <label for="agent_email" class="control-label">E-mail</label>
                        <div>
                            <input type="email" class="form-control" id="agent_email" name="agent[email]" value="{{ old('agent[email]', isset($row) ? (isset($row->Agents[0])?$row->Agents[0]['email']:'') : '') }}" data-fv-notempty />
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('agent[national_id]') ? ' has-danger' : '' }}">
                        <label for="agent[national_id]" class="control-label">CPF</label>
                        <div>
                            <input type="text" id="agent[national_id]" name="agent[national_id]" class="form-control cpf_mask" value="{{ old('agent[national_id]', isset($row) ? (isset($row->Agents[0])?$row->Agents[0]['national_id']:'') : '') }}" data-fv-notempty />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4{{ $errors->has('agent[gender]') ? ' has-danger' : '' }}">
                        <label for="agent[gender]" class="control-label">Sexo</label>
                        <div>
                            <select name="agent[gender]" id="agent[gender]" class="form-control" value="">
                                <option value="">Selecione</option>
                                <option value="male" {{ old('agent[gender]', isset($row) ? (isset($row->Agents[0])?($row->Agents[0]['gender']=='male'?'selected':''):''): '') }}>Masculino</option>
                                <option value="female" {{ old('agent[gender]', isset($row) ? (isset($row->Agents[0])?($row->Agents[0]['gender']=='female'?'selected':''):''): '') }}>Feminino</option>
                                <option value="not_defined" {{ old('agent[gender]', isset($row) ? (isset($row->Agents[0])?($row->Agents[0]['gender']=='not_defined'?'selected':''):''): '') }}>Não definido</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('agent[phone]') ? ' has-danger' : '' }}">
                        <label for="agent[phone]" class="control-label">Telefone</label>
                        <div>
                            <input type="tel" id="agent[phone]" name="agent[phone]" class="form-control fone_mask"  value="{{ old('agent[phone]', isset($row) ? (isset($row->Agents[0])?$row->Agents[0]['phone']:'') : '') }}" />
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('agent[cellphone]') ? ' has-danger' : '' }}">
                        <label for="agent[cellphone]" class="control-label">Celular</label>
                        <div>
                            <input type="tel" id="agent[cellphone]" name="agent[cellphone]" class="form-control fone_mask" value="{{ old('agent[cellphone]', isset($row) ? (isset($row->Agents[0])?$row->Agents[0]['cellphone']:'') : '') }}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button name="save" type="submit" class="btn btn-primary">Salvar</button>
                </div>

            </div>

        </form>


    </div>
</div>
@endsection