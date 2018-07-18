@extends('emails.layouts.common')

@section('content')
    <h1>Boleto dispónível</h1>

    <p>Seu boleto já está disponível, acesse o link abaixo e baixe para efetuar o pagamento.</p>

    <p>
        <a href="{{ $url_boleto }}" class="btn btn-default btn-outline" target="_blank">{{ $url_boleto }}</a>
    </p>

@endsection