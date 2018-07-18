@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="panel">

        {{--<v-image-upload></v-image-upload>--}}

        <!-- <form class="form-validate" method="post" action="{{ isset($id)?route('pedidos_empresa.update', ['id' => $id]):route('pedidos_empresa.store') }}"> -->
        <form class="form-validate" method="post" action="{{ isset($id)?route('pedidos_empresa.update', ['id' => $id]):route('pedidos_empresa.order_confirm') }}">
            {{ isset($id)?method_field('PUT'):'' }}
            {{ csrf_field() }}

            <div class="panel-body container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="form-group col-md-6{{ $errors->has('company_id') ? ' has-danger' : '' }}">
                                <label for="category_id" class="control-label">Empresa</label>
                                <div>
                                    <select name="company_id" id="company_id" class="form-control" v-model="company">
                                        <option value="">Selecione</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6{{ $errors->has('shipping_address') ? ' has-danger' : '' }}">
                                <address-select :company_id="company"></address-select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <order-item :products="{{ $products  }}" :company="company"></order-item>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">

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