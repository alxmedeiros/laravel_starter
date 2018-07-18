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

    <link rel="apple-touch-icon" href="{{ URL::asset('/themes/remark/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/themes/remark/assets/images/favicon.ico') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ URL::asset('/themes/remark/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/themes/remark/assets/css/bootstrap-extend.min.css') }}">

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <style>
        .page-content {
            padding: 40px;
        }
    </style>
</head>
<body class="animsition">

<div id="app">

    <div class="page-content">

        <div class="container">

            <div class="row">
            @foreach($orders as $order)
                <div class="col-lg-6">
                    <table class="table table-bordered text-uppercase">
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
                                    <strong>R$ {{ formatCurrency($item->getTotal()) }}</strong>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">
                                    <strong>Destinatário:</strong><br />
                                    {{ $order->customer->first_name }}<br />
                                    {{ $order->enderecoEntrega->street_address }}, {{ $order->enderecoEntrega->number }}<br />
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
                </div>
            @endforeach
            </div>

        </div>

    </div>

</div>

</body>
</html>