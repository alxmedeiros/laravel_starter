@extends('admin.layouts.app')

@section('content')
<div class="page">

    <div class="page-header">
        <h1 class="page-title">Relatório de Vendas</h1>
    </div>

    <div class="page-content">
        <!-- Panel -->
        <div class="panel">
            <div class="panel-body container-fluid">

                <div class="example-wrap">

                    <div class="filtros m-b-lg">
                        <h4 class="example-title">Filtros</h4>

                        <form action="{{ route('reports.venda') }}">

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="filter_by" class="form-control-label">Filtrar por:</label>
                                    <div>
                                        <select name="filter_by" id="filter_by" class="form-control">
                                            <option value="created_at">Data de criação</option>
                                            <option value="updated_at">Data de atualização</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="group_by" class="form-control-label">Agrupar por:</label>
                                    <div>
                                        <select name="group_by" id="group_by" class="form-control">
                                            <option value="day">Dia</option>
                                            <option value="month">Mês</option>
                                            <option value="year">Ano</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="start" class="form-control-label">Período:</label>
                                    <div>
                                        <div class="input-daterange" data-plugin="datepicker" data-format="dd/mm/yyyy" data-language="br">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control datepicker" id="start" name="start" />
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">até</span>
                                                <input type="text" class="form-control datepicker" id="end" name="end" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="form-group col-md-3">--}}
                                    {{--<label for="from" class="form-control-label">De:</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" name="from" id="from" />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-3">--}}
                                    {{--<label for="to" class="form-control-label">Até:</label>--}}
                                    {{--<div>--}}
                                        {{--<input type="text" class="form-control" name="to" id="to" />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="type" class="form-control-label">Tipo do pedido:</label>
                                    <div>
                                        <select name="type" id="type" class="form-control">
                                            <option value="pf">Pessoa Física</option>
                                            <option value="pj">Pessoa Jurídica</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="status" class="form-control-label">Selecione 1 ou mais status:</label>
                                    <div>
                                        <select name="status[]" id="status" class="form-control" multiple>
                                        @foreach($status as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 offset-9 text-right">
                                    <button class="btn btn-primary">Gerar relatóro</button>
                                </div>
                            </div>

                        </form>

                    </div>

                    @isset($results)
                    <div class="table-responsive">
                        <table class="table table-hover dataTable table-striped w-full" id="tableReport">
                            <thead>
                                <tr>
                                    <th>Período</th>
                                    <th>Pedidos</th>
                                    <th>Itens Vendidos</th>
                                    <th>Total Vendido</th>
                                    <th>Vendas enviadas</th>
                                    <th>Total em Descontos</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Período</th>
                                    <th>Pedidos</th>
                                    <th>Itens Vendidos</th>
                                    <th>Total Vendido</th>
                                    <th>Vendas enviadas</th>
                                    <th>Total em Descontos</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($results as $item)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</td>
                                    <td>{{ $item->orders }}</td>
                                    <td>{{ $item->itens_ordered }}</td>
                                    <td>{{ formatCurrency($item->total_amount) }}</td>
                                    <td>{{ formatCurrency($item->total_shipping) }}</td>
                                    <td>{{ formatCurrency($item->total_discount) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif;
                </div>

            </div>
        </div>
        <!-- End Panel -->
    </div>
</div>
@endsection