@extends('emails.layouts.common')

@section('content')

    <h1>{{ $status==='pago'?'Pagamento Aprovado':'Pagamento recusado' }}</h1>

    @if ($status==='pago')
        <p>Seu pagamento foi aprovado estamos preparando seu pedido para o envio.</p>
    @else
        <p>Consulte o seu cartão de crédito.</p>
    @endif

@endsection