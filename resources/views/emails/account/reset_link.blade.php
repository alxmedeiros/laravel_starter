@extends('emails.layouts.common')

@section('content')

    <h1>Reinicio de senha</h1>
    <p>Olá, {{ $user->name }}, você esqueceu a senha e solicitou uma troca.</p>

    <p>Clique no link abaixo (ou copie e cole no navegador) para continuar o processo de troca de senha.</p>

    <p><a href="{{ route('password.reset', ['token' => $token]) }}" title="">{{ route('password.reset', ['token' => $token]) }}</a></p>

@endsection