@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="panel">

        <form class="form-validate" method="post"
              action="{{ isset($id)?route('pedidos.update', ['id' => $id]):route('pedidos.store') }}" enctype=multipart/form-data>
            {{ isset($id)?method_field('PUT'):'' }}
            {{ csrf_field() }}

            <div class="panel-body container-fluid">

                <div class="row">
                    <div class="col-lg-4">
                        <h3>Dados do Cliente</h3>
                        <p>
                            <a class="font-size-20" href="" title="Ver cliente">
                                {{ $row->customer->full_name }}
                            </a>
                            <br /> E-mail: <span class="font-size-20">{{ $row->customer->email }}</span>
                            <br /> CPF/CNPJ: <span class="font-size-20">{{ $row->customer->national_id }}</span>
                            <br />
                            <abbr title="Phone">Telefone:</abbr> <span class="font-size-20">{{ $row->customer->phone }}</span>
                            <br />
                            <br />
                            <span class="font-size-20">Endereço</span>
                            <address>
                                {{ $row->customer->addresses[0]->street_address }}, {{ $row->customer->addresses[0]->number }} - {{ $row->customer->addresses[0]->district }}
                                <br> {{ $row->customer->addresses[0]->cidade->name }}, {{ $row->customer->addresses[0]->cidade->state }}, {{ $row->customer->addresses[0]->postal_code }}<br />
                                {{ $row->customer->addresses[0]->street_address_complement }}
                            </address>
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h4>Dados do Pedido</h4>
                        <p>
                            <a class="font-size-20" href="javascript:void(0)">#{{ str_pad($row->id, 6, "0", STR_PAD_LEFT) }}</a>
                        </p>
                        <span>Data do pedido: {{ $row->created_at->format('d/m/Y') }}</span>
                        <br />
                        <p class="card-text">
                            {{ $row->metodoEntrega->carrier }} ({{ $row->metodoEntrega->service_description }}) -
                            Entrega em até {{ $row->delivery_time }} dia{{ $row->delivery_time>1?'s':'' }} út{{ $row->delivery_time>1?'eis':'il' }}
                        </p>
                        <div class="card-text">
                            Valor do frete: {{ formatCurrency($row->shipping_amount) }}
                        </div>
                        <br />
                        <span class="font-size-20">Endereço de entrega</span>
                        <address>
                            {{ $row->enderecoEntrega->street_address }}, {{ $row->enderecoEntrega->number }} - {{ $row->enderecoEntrega->district }}
                            <br> {{ $row->enderecoEntrega->cidade->name }}, {{ $row->enderecoEntrega->cidade->state }}, {{ $row->enderecoEntrega->postal_code }}<br />
                            {{ $row->enderecoEntrega->street_address_complement }}
                        </address>

                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="tracking_code" class="control-label">Código de Rastreio</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tracking_code" name="tracking_code" value="{{ old('tracking_code', isset($row) ? $row->tracking_code : '') }}" data-fv-notempty />
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4>Dados do Pagamento</h4>
                        <p class="font-size-20">
                            <span>Valor do pedido: </span>{{ formatCurrency($row->total) }}
                        </p>

                        @isset($payment)
                        <p>
                            @isset($payment['type'])
                            <span class="block"><strong>Forma de Pagamento: </strong> {{ $payment['type']->type }}</span>
                            @endisset
                            @isset($payment['brand'])
                            <span class="block"><strong>Bandeira: </strong> {{ $payment['brand']->brand }}</span>
                            @endisset
                            @isset($payment['installments'])
                            <span class="block"><strong>Parcelas: </strong> {{ $payment['installments'] }}</span>
                            @endisset
                        </p>
                        @endisset

                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="nfe_xml" class="control-label">XML da Nota fiscal</label>
                                    <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                        <input type="text" class="form-control" readonly />
                                        <span class="input-group-btn">
                                            <span class="btn btn-outline btn-file">
                                                <i class="icon wb-upload" aria-hidden="true"></i>
                                                <input type="file" name="nfe_xml" />
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="nfe_pdf" class="control-label">PDF da Nota fiscal</label>
                                    <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                        <input type="text" class="form-control" readonly />
                                        <span class="input-group-btn">
                                            <span class="btn btn-outline btn-file">
                                                <i class="icon wb-upload" aria-hidden="true"></i>
                                                <input type="file" name="nfe_pdf" />
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                        {{--<address>--}}
                            {{--795 Folsom Ave, Suite 600--}}
                            {{--<br> San Francisco, CA, 94107--}}
                            {{--<br>--}}
                            {{--<abbr title="Phone">P:</abbr>&nbsp;&nbsp;(123) 456-7890--}}
                            {{--<br>--}}
                        {{--</address>--}}
                        {{--<span>Invoice Date: January 20, 2017</span>--}}
                        {{--<br>--}}
                        {{--<span>Due Date: January 22, 2017</span>--}}
                    </div>
                </div>

                <div class="page-invoice-table table-responsive">
                    <table class="table table-hover text-right">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Descrição</th>
                                <th class="text-right">Quantidade</th>
                                <th class="text-right">Custo R$</th>
                                <th class="text-right">Total R$</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($row->items as $index => $rowItem)
                            <tr>
                                <td class="text-center">
                                    {{ $index+1 }}
                                </td>
                                <td class="text-left">
                                    {{ $rowItem->name }}
                                </td>
                                <td>
                                    {{ $rowItem->qty  }}
                                </td>
                                <td>
                                    {{ formatCurrency($rowItem->price) }}
                                </td>
                                <td>
                                    {{ formatCurrency($rowItem->getTotal()) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-right clearfix">
                    <div class="float-right">
                        <p>Subtotal: <span>{{ formatCurrency($row->total-$row->shipping_amount+$row->discount_amount) }}</span></p>
                        <p>Desconto: <span>{{ formatCurrency($row->discount_amount) }}</span></p>
                        <p>Frete: <span>{{ formatCurrency($row->shipping_amount) }}</span></p>

                        <p class="page-invoice-amount">Total: <span>{{ formatCurrency($row->total) }}</span></p>
                    </div>
                </div>

                <!--
                <div class="row">
                    <div class="col-md-8">

                        <div class="row">
                            {{--<div class="form-group col-md-3{{ $errors->has('category_id') ? ' has-danger' : '' }}">--}}
                                {{--<label for="category_id" class="control-label">Categoria</label>--}}
                                {{--<div>--}}
                                    {{--<select name="category_id" id="category_id" class="form-control">--}}
                                        {{--<option value="">Selecione</option>--}}
                                        {{--@foreach($categories as $category)--}}
                                        {{--<option value="{{ $category->id }}">{{ $category->name }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group col-md-6{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label for="name" class="control-label">Nome</label>
                                <div>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($row) ? $row->name : '') }}" data-fv-notempty />
                                    @if ($errors->has('name'))
                                        <small class="form-control-feedback">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('short_name') ? ' has-danger' : '' }}">
                                <label for="short_name" class="control-label">Nome curto</label>
                                <div>
                                    <input type="text" class="form-control" id="short_name" name="short_name" value="{{ old('short_name', isset($row) ? $row->short_name : '') }}" data-fv-notempty />
                                    @if ($errors->has('short_name'))
                                        <small class="form-control-feedback">{{ $errors->first('short_name') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{--<div class="row">--}}
                            {{--<div class="form-group col-md-4{{ $errors->has('sku') ? ' has-danger' : '' }}">--}}
                                {{--<label for="sku" class="control-label">SKU</label>--}}
                                {{--<div>--}}
                                    {{--<input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku', isset($row) ? $row->sku : '') }}" data-fv-notempty />--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <fieldset>
                            <legend>Configuração venda - PF</legend>

                            <div class="row">
                                <div class="form-group col-md-3{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label for="price" class="control-label">Preço unitário</label>
                                    <div>
                                        <input type="text" class="form-control" id="price" name="price" v-money="money" value="{{ old('price', isset($row) ? $row->price : '') }}" data-fv-notempty />
                                        @if ($errors->has('price'))
                                            <small class="form-control-feedback">{{ $errors->first('price') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-4{{ $errors->has('min_amount') ? ' has-danger' : '' }}">
                                    <label for="min_amount" class="control-label">Qtde. Mínima de compra</label>
                                    <div>
                                        <input type="text" class="form-control" id="min_amount" name="min_amount" value="{{ old('min_amount', isset($row) ? $row->min_amount : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="products_mix" class="control-label">&nbsp;</label>
                                    <div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="products_mix" name="products_mix" value="1" {{ old('products_mix', isset($row) && $row->products_mix === 1 ? 'checked' : '') }} />
                                            <label for="products_mix">Mix de produtos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3{{ $errors->has('stock_amount') ? ' has-danger' : '' }}">
                                    <label for="stock_amount" class="control-label">Qtde. em Estoque</label>
                                    <div>
                                        <input type="text" class="form-control" id="stock_amount" name="stock_amount" value="{{ old('stock_amount', isset($row) ? $row->stock_amount : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-3{{ $errors->has('min_stock_amount') ? ' has-danger' : '' }}">
                                    <label for="min_stock_amount" class="control-label">Estoque mínimo</label>
                                    <div>
                                        <input type="text" class="form-control" id="min_stock_amount" name="min_stock_amount" value="{{ old('min_stock_amount', isset($row) ? $row->min_stock_amount : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-3{{ $errors->has('stock_status') ? ' has-danger' : '' }}">
                                    <label for="stock_status" class="control-label">Status do estoque</label>
                                    <div>
                                        <select name="stock_status" id="stock_status" class="form-control">
                                            <option value="in-stock" {{ old('stock_status', isset($row) && $row->stock_status === 'in-stock' ? 'selected' : '') }}>Em estoque</option>
                                            <option value="out-of-stock" {{ old('stock_status', isset($row) && $row->stock_status === 'out-of-stock' ? 'selected' : '') }}>Esgotado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3{{ $errors->has('weight') ? ' has-danger' : '' }}">
                                    <label for="weight" class="control-label">Peso (KG)</label>
                                    <div>
                                        <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight', isset($row) ? $row->weight : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-3{{ $errors->has('length') ? ' has-danger' : '' }}">
                                    <label for="length" class="control-label">Comprimento (CM)</label>
                                    <div>
                                        <input type="text" class="form-control" id="length" name="length" value="{{ old('length', isset($row) ? $row->length : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-3{{ $errors->has('height') ? ' has-danger' : '' }}">
                                    <label for="height" class="control-label">Altura (CM)</label>
                                    <div>
                                        <input type="text" class="form-control" id="height" name="height" value="{{ old('height', isset($row) ? $row->height : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-3{{ $errors->has('width') ? ' has-danger' : '' }}">
                                    <label for="width" class="control-label">Largura (CM)</label>
                                    <div>
                                        <input type="text" class="form-control" id="width" name="width" value="{{ old('width', isset($row) ? $row->width : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset>
                            <legend>Configuração venda - PJ</legend>

                            <div class="row">
                                <div class="form-group col-md-3{{ $errors->has('wholesale_price') ? ' has-danger' : '' }}">
                                    <label for="wholesale_price" class="control-label">Preço da caixa</label>
                                    <div>
                                        <input type="text" class="form-control" id="wholesale_price" name="wholesale_price" v-money="money" value="{{ old('wholesale_price', isset($row) ? $row->wholesale_price : '') }}" data-fv-notempty />
                                        @if ($errors->has('wholesale_price'))
                                            <small class="form-control-feedback">{{ $errors->first('wholesale_price') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-4{{ $errors->has('wholesale_min_amount') ? ' has-danger' : '' }}">
                                    <label for="wholesale_min_amount" class="control-label">Qtde. Mínima de compra</label>
                                    <div>
                                        <input type="text" class="form-control" id="wholesale_min_amount" name="wholesale_min_amount" value="{{ old('wholesale_min_amount', isset($row) ? $row->wholesale_min_amount : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="wholesale_products_mix" class="control-label">&nbsp;</label>
                                    <div>
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="wholesale_products_mix" name="wholesale_products_mix" value="1" {{ old('wholesale_products_mix', isset($row) && $row->wholesale_products_mix === 1 ? 'checked' : '') }} />
                                            <label for="wholesale_products_mix">Mix de produtos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3{{ $errors->has('wholesale_weight') ? ' has-danger' : '' }}">
                                    <label for="wholesale_weight" class="control-label">Peso</label>
                                    <div>
                                        <input type="text" class="form-control" id="wholesale_weight" name="wholesale_weight" value="{{ old('wholesale_weight', isset($row) ? $row->wholesale_weight : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-3{{ $errors->has('wholesale_stock_amount') ? ' has-danger' : '' }}">
                                    <label for="wholesale_stock_amount" class="control-label">Qtde. em Estoque</label>
                                    <div>
                                        <input type="text" class="form-control" id="wholesale_stock_amount" name="wholesale_stock_amount" value="{{ old('wholesale_stock_amount', isset($row) ? $row->wholesale_stock_amount : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-3{{ $errors->has('wholesale_min_stock_amount') ? ' has-danger' : '' }}">
                                    <label for="wholesale_min_stock_amount" class="control-label">Estoque mínimo</label>
                                    <div>
                                        <input type="text" class="form-control" id="wholesale_min_stock_amount" name="wholesale_min_stock_amount" value="{{ old('wholesale_min_stock_amount', isset($row) ? $row->wholesale_min_stock_amount : '') }}" data-fv-notempty />
                                    </div>
                                </div>
                                <div class="form-group col-md-3{{ $errors->has('wholesale_stock_status') ? ' has-danger' : '' }}">
                                    <label for="wholesale_stock_status" class="control-label">Status do estoque</label>
                                    <div>
                                        <select name="wholesale_stock_status" id="wholesale_stock_status" class="form-control">
                                            <option value="in-stock" {{ old('wholesale_stock_status', isset($row) && $row->wholesale_stock_status === 'in-stock' ? 'selected' : '') }}>Em estoque</option>
                                            <option value="out-of-stock" {{ old('wholesale_stock_status', isset($row) && $row->wholesale_stock_status === 'out-of-stock' ? 'selected' : '') }}>Esgotado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        {{--<div class="row">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label for="short_description" class="control-label">Informações</label>--}}
                                {{--<div>--}}
                                    {{--<textarea id="short_description" name="short_description" data-plugin="summernote" :data-plugin-options="summernoteOptions">--}}
                                        {{--{{ old('short_description', isset($row) ? $row->short_description : '') }}--}}
                                    {{--</textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="description" class="control-label">Descrição</label>
                                <div>
                                    <textarea id="description" name="description" data-plugin="summernote">
                                        {{ old('description', isset($row) ? $row->description : '') }}
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        {{--<div class="row">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label for="comparative_table" class="control-label">Tabela comparativa</label>--}}
                                {{--<div>--}}
                                    {{--<textarea id="comparative_table" name="comparative_table" data-plugin="summernote">--}}
                                        {{--{{ old('comparative_table', isset($row) ? $row->comparative_table : '') }}--}}
                                    {{--</textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label for="nutritional_value" class="control-label">Valor nutricional</label>--}}
                                {{--<div>--}}
                                    {{--<textarea id="nutritional_value" name="nutritional_value" data-plugin="summernote">--}}
                                        {{--{{ old('nutritional_value', isset($row) ? $row->nutritional_value : '') }}--}}
                                    {{--</textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label for="preparation_method" class="control-label">Modo de preparo</label>--}}
                                {{--<div>--}}
                                    {{--<textarea id="preparation_method" name="preparation_method" data-plugin="summernote">--}}
                                        {{--{{ old('preparation_method', isset($row) ? $row->preparation_method : '') }}--}}
                                    {{--</textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                    </div>
                    <div class="col-md-4">
                        <v-plupload class="mb-5" uploaded="{{ isset($row)?$row->thumbnail:'' }}" button-text="adicionar foto do produto" upload-field-name="thumbnail"></v-plupload>

                        <v-plupload class="mt-5" uploaded="{{ isset($row)?$row->cover:'' }}" button-text="adicionar foto de capa" upload-field-name="cover"></v-plupload>
                    </div>
                </div>

                <div class="form-group">
                    <button name="save" type="submit" class="btn btn-primary">Salvar</button>
                </div>
                -->

            </div>

        </form>


    </div>
</div>
@endsection