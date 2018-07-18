@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="page-content">
        <!-- Panel -->
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="example-wrap">

                    <form action="{{ route('pedidos.index') }}" method="GET" class="filters">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <input type="search" id="search" name="search" class="form-control" placeholder="Pesquisar por PEDIDO/NOME ou CPF DO CLIENTE" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-success">Buscar</button>
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('pedidos.actions') }}" method="post" target="_blank">
                        {{ csrf_field() }}

                        <div class="actions">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group input-group-sm">
                                        <select name="action" class="form-control">
                                            <option value="">Ações em massa</option>
                                            <option value="print-tags">Gerar etiquetas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <button class="btn btn-primary btn-sm">Aplicar</button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="col-md-2">Nº do Pedido</th>
                                    <th class="col-md-4">Cliente</th>
                                    <th class="col-md-2">Data do pedido</th>
                                    <th class="col-md-2">Status do Pagamento</th>
                                    <th class="col-md-2">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                        <td>
                                            <div class="checkbox-custom checkbox-primary" style="text-align: left;">
                                                <input type="checkbox" name="orders[]" id="order_{{ $row->id }}" value="{{ $row->id }}" />
                                                <label for="order_{{ $row->id }}">{{ $row->id }}</label>
                                            </div>
                                        </td>
                                        <td>{{ isset($row->customer)?$row->customer->full_name:'' }}</td>
                                        <td>{{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}</td>
                                        <td>
                                            @switch($row->statusPedido->slug)
                                                @case('pending_payment')
                                                <span class="badge badge-warning">{{ $row->statusPedido->name }}</span>
                                                @break

                                                @case('processing')
                                                <span class="badge badge-success">Pago</span>
                                                @break

                                                @case('canceled')
                                                <span class="badge badge-dark">Cancelado</span>
                                                @break

                                                @case('holded')
                                                <span class="badge badge-info">Não finalizado</span>
                                                @break

                                                @case('nfe_sent')
                                                <span class="badge badge-info">{{ $row->statusPedido->name }}</span>
                                                @break

                                                @case('order_sent')
                                                <span class="badge badge-default">{{ $row->statusPedido->name }}</span>
                                                @break

                                                @default
                                                <span class="badge badge-default">{{ $row->statusPedido->name }}</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('pedidos.show', ['id' => $row->id]) }}" class="btn btn-default btn-outline" title="Detalhes">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                                {{--<a href="{{ route('pedidos.delete', ['id' => $row->id]) }}" class="btn btn-danger" data-plugin="alertify"--}}
                                                   {{--data-type="confirm" data-confirm-title="This is a confirm dialog"--}}
                                                   {{--data-success-message="You've clicked OK" data-error-message="You've clicked Cancel">--}}
                                                    {{--<i class="fa fa-trash"></i>--}}
                                                {{--</a>--}}
                                                <confirm-button url="{{ route('pedidos.delete', ['id' => $row->id]) }}"></confirm-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $rows->links() }}
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- End Panel -->
    </div>
</div>
@endsection