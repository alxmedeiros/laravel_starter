@extends('emails.layouts.common')

@section('content')

    <h1>Confirmação de cadastro</h1>
    <p>Olá, {{ $user->name }}, seja bem vindo ao novo site da Konjac Massas.</p>

    <p>Você acaba de realizar o cadastro no nosso site, mas pra continuar é preciso clicar no link abaixo e confirmação seu cadastro.</p>

    <p><a href="{{ route('customer.verify', ['token' => $user->email_token]) }}" title="">clique aqui para ativar seu cadastro</a></p>

    <p>ou copie o link abaixo e cole em uma aba nova no seu navegador.</p>

    <p><a href="{{ route('customer.verify', ['token' => $user->email_token]) }}" title="">{{ route('customer.verify', ['token' => $user->email_token]) }}</a></p>

@endsection