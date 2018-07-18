@extends('admin.layouts.app')

@section('content')
<div class="page">
    <div class="panel">

        <div class="page-header">
            <h1 class="page-title font-size-26 font-weight-100">CONFIRMAR PEDIDO</h1>
        </div>
        <div class="page-content container">

            <form class="form-validate" method="post" action="{{ route('pedidos_empresa.store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="company_id" value="{{ $row['company_id'] }}" />
                <input type="hidden" name="shipping_address" value="{{ $row['shipping_address'] }}" />
                <input type="hidden" name="total" value="{{ $row['total'] }}" />
                <input type="hidden" name="subtotal" value="{{ $row['subtotal'] }}" />
                <input type="hidden" name="total_paid" value="{{ $row['total_paid'] }}" />
                <input type="hidden" name="total_qty_ordered" value="{{ $row['total_qty_ordered'] }}" />

                @foreach( $row['produto'] as $key => $item)    
                <input type="hidden" name="produto[{{ $key }}][qty]" value="{{ $item['qty'] }}" />
                @endforeach


                @isset($warning)
                <div class="alert alert-warning m-t-lg">
                    {{ $warning }}
                </div>
                @endisset

                <div class="row">
                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-header card-header-transparent card-header-bordered">
                                Endereço de envio
                            </div>
                            <div class="card-block">
                                <p class="card-text">{{ $row['enderecoEntrega']->street_address }}, {{ $row['enderecoEntrega']->number }} -
                                    {{ $row['enderecoEntrega']->district }}</p>
                                <p class="card-text">{{ $row['enderecoEntrega']->cidade->name }}/{{ $row['enderecoEntrega']->cidade->state }} -
                                    {{ $row['enderecoEntrega']->postal_code }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <ul>
                        @foreach ($shippingMethods as $method)
                            <input type="hidden" name="shipping[{{ $method['id'] }}][delivery_time]" value="{{ $method['delivery_time'] }}" />
                            <input type="hidden" name="shipping[{{ $method['id'] }}][price]" value="{{ $method['price'] }}" />
                            <li class="ml-1 mb-2">
                                <div class="form-check d-flex align-items-center">
                                    <input id="shippingMethod_{{ $method['id'] }}" name="shipping_method" class="form-check-input" type="radio" value="{{ $method['id'] }}" />
                                    <label  for="shippingMethod_{{ $method['id'] }}" class="form-check-label w-100">
                                        <div class="d-flex justify-content-between" style="width: 100%">
                                            <strong>{{ $method['carrier'] }} ({{ $method['description'] }})</strong>
                                            <span>R$ {{ $method['price'] }}</span>
                                        </div>
                                        <div style="width: 100%">
                                            <span>Prazo estimado de entrega: {{ $method['delivery_time'] }} dias úteis</span>
                                        </div>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                        </ul>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header card-header-transparent card-header-bordered">
                                Items do pedido
                            </div>
                            <div class="card-block">

                                <div class="page-invoice-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">&nbsp;</th>
                                                <th>Nome do Produto</th>
                                                <th width="15%">Valor Unit.</th>
                                                <th width="15%">Quant.</th>
                                                <th width="15%">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $row['produtos'] as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ formatCurrency( $item['price'] ) }}</td>
                                                <td>{{ $item['qty'] }}</td>
                                                <td>{{ formatCurrency( $item['total'] ) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="text-right clearfix">
                                    <div class="float-right">
                                        <p class="page-invoice-amount">Total: <span>{{ formatCurrency($row['total']) }}</span></p>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button name="save" type="submit" class="btn btn-primary">Confirmar</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection