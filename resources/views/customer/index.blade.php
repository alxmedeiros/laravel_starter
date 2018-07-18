@extends('customer.layouts.app')

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title font-size-26 font-weight-100">Minha Conta</h1>
            <a href="{{ route('site.products') }}" class="btn btn-link">ir para a loja</a>
        </div>
        <div class="page-content">

            <div class="card card-shadow table-row">
                        <div class="card-header card-header-transparent py-20">
                            ÚLTIMOS PEDIDOS
                        </div>
                        <div class="card-block bg-white table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nº DO PEDIDO</th>
                                        <th>DATA</th>
                                        <th>Status</th>
                                        <th width="50">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($lastOrders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            @switch($order->statusPedido->slug)
                                                @case('pending_payment')
                                                <span class="badge badge-warning">{{ $order->statusPedido->name }}</span>
                                                @break

                                                @case('processing')
                                                <span class="badge badge-success">Pago</span>
                                                @break

                                                @case('canceled')
                                                <span class="badge badge-dark">Cancelado</span>
                                                @break

                                                @case('holded')
                                                <span class="badge badge-info">Não finalizado</span>
                                                @break

                                                @case('nfe_sent')
                                                <span class="badge badge-success">{{ $order->statusPedido->name }}</span>
                                                @break

                                                @case('order_sent')
                                                <span class="badge badge-success">{{ $order->statusPedido->name }}</span>
                                                @break

                                                @default
                                                <span class="badge badge-default">{{ $order->statusPedido->name }}</span>
                                            @endswitch
                                        </td>
                                        <td><a href="{{ route('customer.order_detail', ['id' => $order->id]) }}">detalhes</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

        </div>
    </div>

@endsection