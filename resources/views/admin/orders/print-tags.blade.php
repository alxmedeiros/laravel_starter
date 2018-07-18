<!DOCTYPE html>
<html class="no-js css-menubar" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <style>
        .page-content {
            padding: 40px;
        }
    </style>
</head>
<body class="animsition">

<div id="app">

    <table cellpadding="2" cellspacing="0" border="0">
        <tr>
        @foreach($orders as $order)
            <td width="50%" valign="top" style="padding: 15px; border: 1px solid #000;">
                <table cellpadding="2" cellspacing="0" border="1" style="width: 100%;">
                    <thead>
                        <tr>
                            <th width="50%">
                                <strong>Pedido: #{{ $order->id }}</strong><br />
                            </th>
                            <th width="50%">
                                Realizado: {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach( $order->items as $item)
                        <tr>
                            <td>
                                <strong>{{ $item->name }}</strong><br />
                                Quant: {{ $item->qty }}
                            </td>
                            <td>
                                <strong>{{ formatCurrency($item->getTotal()) }}</strong>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="2">
                            <strong>Destinatário:</strong><br />
                            {{ $order->customer->full_name }}<br />
                            {{ $order->enderecoEntrega->street_address }}, {{ $order->enderecoEntrega->number }}<br />
                            {{ $order->enderecoEntrega->street_address_complement }}<br />
                            {{ $order->enderecoEntrega->district }}, {{ $order->enderecoEntrega->cidade->name }}/{{ $order->enderecoEntrega->cidade->state }}<br />
                            CEP: {{ $order->enderecoEntrega->postal_code }}
                            <br /><br />
                            <p>
                                <strong>{{ $order->metodoEntrega->carrier }} ({{ $order->metodoEntrega->service_description }}) -
                                    Entrega em até {{ $order->delivery_time }} dia{{ $order->delivery_time>1?'s':'' }} út{{ $order->delivery_time>1?'eis':'il' }}</strong>
                            </p>
                            <p>
                                <strong>Valor do frete:</strong> {{ formatCurrency($order->shipping_amount) }}
                            </p>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </td>
            @if ( (($loop->index + 1) % 2) === 0 )
                </tr><tr>
            @endif
        @endforeach
        </tr>
    </table>

</body>
</html>