@extends('emails.layouts.common')

@section('content')

    <p>Olá, {{ $user->name }}.</p>

    <p>Estamos com um novo site e uma nova plataforma de ecommerce.</p>
    <p>Para que possa efetuar compras novamente, clique no link a baixo e crie sua nova senha de acesso;</p>

    <p><a href="{{ route('password.reset', ['token' => $token]) }}" title="">{{ route('password.reset', ['token' => $token]) }}</a></p>

    <p>&nbsp;</p>

    <p>
    	Att.<br />
		Equipe Konjac Massa MF
    </p>

@endsection