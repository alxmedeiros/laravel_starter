@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="panel">

        {{--<v-image-upload></v-image-upload>--}}

        <form class="form-validate" enctype=multipart/form-data method="post"
              action="{{ isset($id)?route('cupons.update', ['id' => $id]):route('cupons.store') }}">
            {{ isset($id)?method_field('PUT'):'' }}
            {{ csrf_field() }}

            <div class="panel-body container-fluid">

                <div class="row">
                    <div class="form-group col-md-4{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label for="name" class="control-label">Identificador</label>
                        <div>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($row) ? $row->name : '') }}" data-fv-notempty />
                            @if ($errors->has('name'))
                            <small class="form-control-feedback">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-7{{ $errors->has('coupon_code') ? ' has-danger' : '' }}">
                                <label for="name" class="control-label">Cupom</label>
                                <div>
                                    <input type="text" class="form-control text-uppercase" id="coupon_code" name="coupon_code" value="{{ old('coupon_code', isset($row) ? $row->coupon_code : '') }}" :disabled="auto_coupon_code == 1" />
                                    @if ($errors->has('coupon_code'))
                                        <small class="form-control-feedback">{{ $errors->first('coupon_code') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="auto_coupon_code" class="control-label">&nbsp;</label>
                                <div>
                                    <div class="checkbox-custom checkbox-primary">
                                        <input type="checkbox" id="auto_coupon_code" name="auto_coupon_code" value="1" checked="{{ old('auto_coupon_code') }}" v-model="auto_coupon_code" />
                                        <label for="auto_coupon_code">Gerar automaticamente</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-4{{ $errors->has('qty') ? ' has-danger' : '' }}">
                        <label for="qty" class="control-label">Qtde. de cupons</label>
                        <div>
                            <input type="text" class="form-control" id="qty" name="qty" value="{{ old('qty', isset($row) ? $row->qty : '') }}" />
                            <span class="text-help text-warning">Deixe em branco para cupons ilimitados</span>
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('amount_type') ? ' has-danger' : '' }}">
                        <label for="amount_type" class="control-label">Tipo do desconto</label>
                        <div>
                            <select name="amount_type" id="amount_type" class="form-control" v-model="amount_type">
                                <option value="">Selecione</option>
                                <option value="percent" {{ old('amount_type', isset($row) ? $row->amount_type : '')=='percent'?'selected':'' }}>Porcentagem</option>
                                <option value="amount" {{ old('amount_type', isset($row) ? $row->amount_type : '')=='amount'?'selected':'' }}>Valor</option>
                            </select>
                            @if ($errors->has('amount_type'))
                                <small class="form-control-feedback">{{ $errors->first('amount_type') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('amount') ? ' has-danger' : '' }}">
                        <label for="amount" class="control-label">Desconto</label>
                        <div>
                            <input type="text" class="form-control" id="amount" name="amount" v-money="amount_type==='amount'?money:percent" value="{{ old('amount', isset($row) ? $row->amount : '') }}" data-fv-notempty />
                            @if ($errors->has('amount'))
                                <small class="form-control-feedback">{{ $errors->first('amount') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4{{ $errors->has('start_date') ? ' has-danger' : '' }}">
                        <label for="start_date" class="control-label">Início da validade</label>
                        <div>
                            <input type="text" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', isset($row) ? $row->start_date->format('d/m/Y') : '') }}" data-plugin="datepicker" data-language="pt-BR" data-format="dd/mm/yyyy" />
                            @if ($errors->has('start_date'))
                                <small class="form-control-feedback">{{ $errors->first('start_date') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-4{{ $errors->has('finish_date') ? ' has-danger' : '' }}">
                        <label for="finish_date" class="control-label">Término da validade</label>
                        <div>
                            <input type="text" class="form-control" id="finish_date" name="finish_date" value="{{ old('finish_date', isset($row) ? $row->finish_date->format('d/m/Y') : '') }}" data-plugin="datepicker" data-language="pt-BR" data-format="dd/mm/yyyy" />
                            @if ($errors->has('finish_date'))
                                <small class="form-control-feedback">{{ $errors->first('finish_date') }}</small>
                            @endif
                        </div>
                    </div>
                </div>
                    {{--<div class="col-md-8">--}}

                        {{--<div class="row">--}}
                            {{--<div class="form-group col-md-6{{ $errors->has('name') ? ' has-danger' : '' }}">--}}
                                {{--<label for="name" class="control-label">Nome</label>--}}
                                {{--<div>--}}
                                    {{--<input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($row) ? $row->name : '') }}" data-fv-notempty />--}}
                                    {{--@if ($errors->has('name'))--}}
                                        {{--<small class="form-control-feedback">{{ $errors->first('name') }}</small>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-6{{ $errors->has('short_name') ? ' has-danger' : '' }}">--}}
                                {{--<label for="short_name" class="control-label">Nome curto</label>--}}
                                {{--<div>--}}
                                    {{--<input type="text" class="form-control" id="short_name" name="short_name" value="{{ old('short_name', isset($row) ? $row->short_name : '') }}" data-fv-notempty />--}}
                                    {{--@if ($errors->has('short_name'))--}}
                                        {{--<small class="form-control-feedback">{{ $errors->first('short_name') }}</small>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<fieldset>--}}
                            {{--<legend>Configuração venda - PF</legend>--}}

                            {{--<div class="row">--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('price') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="price" class="control-label">Preço unitário</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="price" name="price" v-money="money" value="{{ old('price', isset($row) ? $row->price : '') }}" data-fv-notempty />--}}
                                        {{--@if ($errors->has('price'))--}}
                                            {{--<small class="form-control-feedback">{{ $errors->first('price') }}</small>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-4{{ $errors->has('min_amount') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="min_amount" class="control-label">Qtde. Mínima de compra</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="min_amount" name="min_amount" value="{{ old('min_amount', isset($row) ? $row->min_amount : '') }}" data-fv-notempty />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-4">--}}
                                    {{--<label for="products_mix" class="control-label">&nbsp;</label>--}}
                                    {{--<div>--}}
                                        {{--<div class="checkbox-custom checkbox-primary">--}}
                                            {{--<input type="checkbox" id="products_mix" name="products_mix" value="1" {{ old('products_mix', isset($row) && $row->products_mix === 1 ? 'checked' : '') }} />--}}
                                            {{--<label for="products_mix">Mix de produtos</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('stock_amount') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="stock_amount" class="control-label">Qtde. em Estoque</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="stock_amount" name="stock_amount" value="{{ old('stock_amount', isset($row) ? $row->stock_amount : '') }}" data-fv-notempty />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('min_stock_amount') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="min_stock_amount" class="control-label">Estoque mínimo</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="min_stock_amount" name="min_stock_amount" value="{{ old('min_stock_amount', isset($row) ? $row->min_stock_amount : '') }}" data-fv-notempty />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('stock_status') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="stock_status" class="control-label">Status do estoque</label>--}}
                                    {{--<div>--}}
                                        {{--<select name="stock_status" id="stock_status" class="form-control">--}}
                                            {{--<option value="in-stock" {{ old('stock_status', isset($row) && $row->stock_status === 'in-stock' ? 'selected' : '') }}>Em estoque</option>--}}
                                            {{--<option value="out-of-stock" {{ old('stock_status', isset($row) && $row->stock_status === 'out-of-stock' ? 'selected' : '') }}>Esgotado</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('weight') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="weight" class="control-label">Peso (KG)</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight', isset($row) ? $row->weight : '') }}" data-fv-notempty />--}}
                                        {{--@if ($errors->has('weight'))--}}
                                            {{--<small class="form-control-feedback">{{ $errors->first('weight') }}</small>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('length') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="length" class="control-label">Comprimento (CM)</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="length" name="length" value="{{ old('length', isset($row) ? $row->length : '') }}" data-fv-notempty />--}}
                                        {{--@if ($errors->has('length'))--}}
                                            {{--<small class="form-control-feedback">{{ $errors->first('length') }}</small>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('height') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="height" class="control-label">Altura (CM)</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="height" name="height" value="{{ old('height', isset($row) ? $row->height : '') }}" data-fv-notempty />--}}
                                        {{--@if ($errors->has('height'))--}}
                                            {{--<small class="form-control-feedback">{{ $errors->first('height') }}</small>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('width') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="width" class="control-label">Largura (CM)</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="width" name="width" value="{{ old('width', isset($row) ? $row->width : '') }}" data-fv-notempty />--}}
                                        {{--@if ($errors->has('width'))--}}
                                            {{--<small class="form-control-feedback">{{ $errors->first('width') }}</small>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</fieldset>--}}

                        {{--<fieldset>--}}
                            {{--<legend>Configuração venda - PJ</legend>--}}

                            {{--<div class="row">--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('wholesale_price') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="wholesale_price" class="control-label">Preço da caixa</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="wholesale_price" name="wholesale_price" v-money="money" value="{{ old('wholesale_price', isset($row) ? $row->wholesale_price : '') }}" data-fv-notempty />--}}
                                        {{--@if ($errors->has('wholesale_price'))--}}
                                            {{--<small class="form-control-feedback">{{ $errors->first('wholesale_price') }}</small>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-4{{ $errors->has('wholesale_min_amount') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="wholesale_min_amount" class="control-label">Qtde. Mínima de compra</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="wholesale_min_amount" name="wholesale_min_amount" value="{{ old('wholesale_min_amount', isset($row) ? $row->wholesale_min_amount : '') }}" data-fv-notempty />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-4">--}}
                                    {{--<label for="wholesale_products_mix" class="control-label">&nbsp;</label>--}}
                                    {{--<div>--}}
                                        {{--<div class="checkbox-custom checkbox-primary">--}}
                                            {{--<input type="checkbox" id="wholesale_products_mix" name="wholesale_products_mix" value="1" {{ old('wholesale_products_mix', isset($row) && $row->wholesale_products_mix === 1 ? 'checked' : '') }} />--}}
                                            {{--<label for="wholesale_products_mix">Mix de produtos</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('wholesale_weight') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="wholesale_weight" class="control-label">Peso</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="wholesale_weight" name="wholesale_weight" value="{{ old('wholesale_weight', isset($row) ? $row->wholesale_weight : '') }}" data-fv-notempty />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('wholesale_stock_amount') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="wholesale_stock_amount" class="control-label">Qtde. em Estoque</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="wholesale_stock_amount" name="wholesale_stock_amount" value="{{ old('wholesale_stock_amount', isset($row) ? $row->wholesale_stock_amount : '') }}" data-fv-notempty />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('wholesale_min_stock_amount') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="wholesale_min_stock_amount" class="control-label">Estoque mínimo</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" id="wholesale_min_stock_amount" name="wholesale_min_stock_amount" value="{{ old('wholesale_min_stock_amount', isset($row) ? $row->wholesale_min_stock_amount : '') }}" data-fv-notempty />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-3{{ $errors->has('wholesale_stock_status') ? ' has-danger' : '' }}">--}}
                                    {{--<label for="wholesale_stock_status" class="control-label">Status do estoque</label>--}}
                                    {{--<div>--}}
                                        {{--<select name="wholesale_stock_status" id="wholesale_stock_status" class="form-control">--}}
                                            {{--<option value="in-stock" {{ old('wholesale_stock_status', isset($row) && $row->wholesale_stock_status === 'in-stock' ? 'selected' : '') }}>Em estoque</option>--}}
                                            {{--<option value="out-of-stock" {{ old('wholesale_stock_status', isset($row) && $row->wholesale_stock_status === 'out-of-stock' ? 'selected' : '') }}>Esgotado</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</fieldset>--}}

                        {{--<div class="row">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label for="description" class="control-label">Descrição</label>--}}
                                {{--<div>--}}
                                    {{--<textarea id="description" name="description" data-plugin="summernote">--}}
                                        {{--{{ old('description', isset($row) ? $row->description : '') }}--}}
                                    {{--</textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<v-plupload class="mb-5" uploaded="{{ isset($row)?$row->thumbnail:'' }}" button-text="adicionar foto do produto" upload-field-name="thumbnail"></v-plupload>--}}

                        {{--<v-plupload class="mt-5" uploaded="{{ isset($row)?$row->cover:'' }}" button-text="adicionar foto de capa" upload-field-name="cover"></v-plupload>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    <button name="save" type="submit" class="btn btn-primary">Salvar</button>
                </div>

            </div>

        </form>


    </div>
</div>
@endsection