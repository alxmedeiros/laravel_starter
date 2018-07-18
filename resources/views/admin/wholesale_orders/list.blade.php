@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="page-content">
        <!-- Panel -->
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="example-wrap">

                    <form action="{{ route('pedidos_empresa.index') }}" method="GET" class="filters">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="search" id="search" name="search" class="form-control" placeholder="Pesquisar por PEDIDO/CNPJ DO CLIENTE" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-success">Buscar</button>
                            </div>
                        </div>
                    </form>

                    {{--<form action="{{ route('pedidos_empresa.actions') }}" method="post" target="_blank">--}}
{{--                        {{ csrf_field() }}--}}

                        {{--<div class="actions">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-lg-3">--}}
                                    {{--<div class="form-group input-group-sm">--}}
                                        {{--<select name="action" class="form-control">--}}
                                            {{--<option value="">Ações em massa</option>--}}
                                            {{--<option value="print-tags">Gerar etiquetas</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-lg-1">--}}
                                    {{--<button class="btn btn-primary btn-sm">Aplicar</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="col-md-2">Nº do Pedido</th>
                                    <th class="col-md-4">Cliente</th>
                                    <th class="col-md-2">Data do pedido</th>
                                    <th class="col-md-2">Status do Pedido</th>
                                    <th class="col-md-2">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                        <td>
                                            {{--<div class="checkbox-custom checkbox-primary" style="text-align: left;">--}}
                                                {{--<input type="checkbox" name="orders[]" id="order_{{ $row->id }}" value="{{ $row->id }}" />--}}
                                                {{--<label for="order_{{ $row->id }}">{{ $row->id }}</label>--}}
                                            {{--</div>--}}
                                            {{ $row->id }}
                                        </td>
                                        <td>{{ ($row->company)?$row->company->company_name:'' }}</td>
                                        <td>{{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}</td>
                                        <td>
                                            @switch($row->status)
                                                @case('new')
                                                <span class="badge badge-default">Novo</span>
                                                @break

                                                @case('pending')
                                                <span class="badge badge-warning">Pendente</span>
                                                @break

                                                @case('sent_boleto')
                                                <span class="badge badge-info">Boleto enviado</span>
                                                @break

                                                @case('sent_shipping')
                                                <span class="badge badge-info">Enviado para Transportadora</span>
                                                @break

                                                @case('waiting')
                                                <span class="badge badge-default">Aguardando</span>
                                                @break

                                                @case('rejected')
                                                <span class="badge badge-danger">Rejeitado</span>
                                                @break

                                                @case('canceled')
                                                <span class="badge badge-danger">Cancelado</span>
                                                @break

                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('pedidos_empresa.show', ['id' => $row->id]) }}" class="btn btn-default btn-outline" title="Detalhes">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            @if ( $row->status !== 'rejected' && $row->company->max_amount > 0 && $row->total > $row->company->max_amount )
                                                <a href="{{ route('pedidos_empresa.reject', ['id' => $row->id]) }}" class="btn btn-danger btn-outline" title="Rejeitar">
                                                    <i class="fa fa-ban"></i>
                                                </a>
                                            @endif
                                                <confirm-button url="{{ route('pedidos_empresa.delete', ['id' => $row->id]) }}"></confirm-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $rows->links() }}
                        </div>

                    {{--</form>--}}
                </div>
            </div>
        </div>
        <!-- End Panel -->
    </div>
</div>
@endsection