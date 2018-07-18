@extends('customer.layouts.app')

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title font-size-26 font-weight-100">DETALHES DO PEDIDO #{{ $row->id }}</h1>
        </div>
        <div class="page-content container">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header card-header-transparent card-header-bordered">
                            Endereço de envio
                        </div>
                        <div class="card-block">
                            <p class="card-text">{{ $row->enderecoEntrega->street_address }}, {{ $row->enderecoEntrega->number }} -
                                {{ $row->enderecoEntrega->district }}</p>
                            <p class="card-text">{{ $row->enderecoEntrega->cidade->name }}/{{ $row->enderecoEntrega->cidade->state }} -
                                {{ $row->enderecoEntrega->postal_code }}<br />
                                {{ $row->enderecoEntrega->street_address_complement }}</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-transparent card-header-bordered">
                            Endereço de cobrança
                        </div>
                        <div class="card-block">
                            <p class="card-text">{{ $row->enderecoCobranca->street_address }}, {{ $row->enderecoCobranca->number }} -
                                {{ $row->enderecoCobranca->district }}</p>
                            <p class="card-text">{{ $row->enderecoCobranca->cidade->name }}/{{ $row->enderecoCobranca->cidade->state }} -
                                {{ $row->enderecoCobranca->postal_code }}<br />
                            {{ $row->enderecoCobranca->street_address_complement }}</p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header card-header-transparent card-header-bordered">
                            Dados da entrega
                        </div>
                        <div class="card-block">
                            <p class="card-text">
                                {{ $row->metodoEntrega->carrier }} ({{ $row->metodoEntrega->service_description }}) -
                                Entrega em até {{ $row->delivery_time }} dia{{ $row->delivery_time>1?'s':'' }} út{{ $row->delivery_time>1?'eis':'il' }}
                            </p>

                        @if( $row->tracking_code )
                            @if( $row->metodoEntrega->carrier === 'Correios' )
                                <a href="http://www.linkcorreios.com.br/{{ $row->tracking_code }}" target="_blank" class="btn btn-primary">Acompanhe seu pedido</a>
                            @else
                                <a href="http://www.braspress.com.br/w/tracking/search?cnpj={{ $row->customer->national_id }}&documentType=PEDIDO&numero={{ $row->id }}" target="_blank" class="btn btn-primary">Acompanhe seu pedido</a>
                            @endif
                        @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-transparent card-header-bordered">
                            Método de Pagamento
                        </div>
                        <div class="card-block">
                            <p class="card-text">Pagamento processado por: </p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="cart-text">
                                        <img src="/images/cielo-logo.png" alt="CIELO" />
                                    </p>
                                </div>
                            @if( $row->nfe_xml && $row->nfe_pdf)
                                <div class="col-lg-6">
                                    <a href="" target="_blank" class="btn btn-primary">Imprimir nota fiscal</a>
                                </div>
                            @endif
                            </div>

                        </div>
                    </div>

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
                                    @foreach( $row->items as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ formatCurrency( $item->price ) }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ formatCurrency( $item->getTotal() ) }}</td>
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

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection