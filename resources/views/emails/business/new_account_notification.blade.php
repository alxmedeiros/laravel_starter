@extends('emails.layouts.common')

@section('content')

    <h1>Nova conta de Empresa</h1>
    <p>Uma nova conta de representante foi criada.</p>

    <p>
    	<a href="{{ route('empresas.edit', ['id' => $company->id]) }}" class="btn btn-default btn-outline">Clique aqui</a> e veja mais detalhes
    </p>

@endsection