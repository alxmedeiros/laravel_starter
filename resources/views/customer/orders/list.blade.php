@extends('customer.layouts.app')

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title font-size-26 font-weight-100">MEUS PEDIDOS</h1>
        </div>
        <div class="page-content container">
            <div class="row">
                <div class="col-lg-12" id="ecommerceRecentOrder">
                    <div class="card card-shadow table-row">
                        <div class="card-header card-header-transparent py-20">
                            TODOS
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
                                @foreach($rows as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <!-- <span class="badge badge-success font-weight-100">{{ $order->status()->first()->name }}</span> -->
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
                                                <span class="badge badge-info">{{ $order->statusPedido->name }}</span>
                                                @break

                                                @case('order_sent')
                                                <span class="badge badge-success">{{ $order->statusPedido->name }}</span>
                                                @break

                                                @default
                                                <span class="badge badge-default">{{ $order->statusPedido->name }}</span>
                                            @endswitch
                                        </td>
                                        <td><a href="{{ route('customer.order_detail', ['id' => $order->id]) }}">ver pedido</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $rows->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection