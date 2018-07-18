@extends('customer.layouts.app')

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title font-size-26 font-weight-100">Novo endereço</h1>
        </div>
        <div class="page-content">

            <div class="panel">

                <form action="{{ isset($id)?route('customer.address.update', ['id' => $id]):route('customer.address.save') }}" id="cart-form" method="post" style="padding-bottom: 40px;">
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

                        @isset($id)
                        <a href="{{ route('customer.address.delete', ['id' => $id]) }}" class="btn btn-outline btn-danger" style="float: right;">
                            <i class="fa fa-trash"></i>
                        </a>
                        @endisset

                        <div class="row">

                            <div class="col-lg-8">

                                @if (session('error'))
                                    <div class="alert alert-danger m-t-lg">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                                            <label for="postal_code" class="control-label">CEP</label>
                                            <input id="postal_code" name="postal_code" class="form-control cep_mask" required value="{{ old('postal_code', isset($row) ? $row->postal_code : '') }}" />
                                            @if ($errors->has('postal_code'))
                                                <small class="form-control-feedback">{{ $errors->first('postal_code') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="form-group{{ $errors->has('street_address') ? ' has-danger' : '' }}">
                                            <label for="street_address" class="control-label">Endereço</label>
                                            <input type="text" class="form-control" id="street_address" name="street_address" required value="{{ old('street_address', isset($row) ? $row->street_address : '') }}" />
                                            @if ($errors->has('street_address'))
                                                <small class="form-control-feedback">{{ $errors->first('street_address') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                            <label for="number" class="control-label">Número</label>
                                            <input type="text" class="form-control" id="number" name="number"  required value="{{ old('number', isset($row) ? $row->number : '') }}" />
                                            @if ($errors->has('number'))
                                                <small class="form-control-feedback">{{ $errors->first('number') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="street_address_complement" class="control-label">Complemento</label>
                                            <input type="text" class="form-control" id="street_address_complement" name="street_address_complement" value="{{ old('street_address_complement', isset($row) ? $row->street_address_complement : '') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group{{ $errors->has('district') ? ' has-danger' : '' }}">
                                            <label for="district" class="control-label">Bairro</label>
                                            <input type="text" class="form-control" id="district" name="district"  required value="{{ old('district', isset($row) ? $row->district : '') }}" />
                                            @if ($errors->has('district'))
                                                <small class="form-control-feedback">{{ $errors->first('district') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <estado-cidade :errors="'{{ $errors }}'" :region="'{{ old('region', isset($row) ? $row->region : '') }}'" :locality="'{{ old('locality', isset($row) ? $row->locality : '') }}'"></estado-cidade>
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