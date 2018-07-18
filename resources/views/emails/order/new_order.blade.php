@extends('emails.layouts.common')

@section('content')

    <h1>Compra efetuada</h1>
    <p>Olá, {{ $user->name }}, você acabou de fazer um pedido no site da Konjac Massas.</p>

    <p>Recebemos seu pedido, e estamos aguardando o processamento do seu pagamento.</p>

@endsection