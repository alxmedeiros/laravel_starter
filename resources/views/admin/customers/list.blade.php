@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="page-content">
        <!-- Panel -->
        <div class="panel">
            <div class="panel-body container-fluid">

                <form action="{{ route('clientes.index') }}" method="GET" class="filters">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input type="search" id="search" name="search" class="form-control" placeholder="Pesquisar por NOME/CPF/EMAIL" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button class="btn btn-success">Buscar</button>
                        </div>
                    </div>
                </form>

                <div class="example-wrap">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="col-md-1">#</th>
                                    <th class="col-md-3">Nome/Razão Social</th>
                                    <th class="col-md-3">CPF/CNPJ</th>
                                    <th class="col-md-3">E-mail</th>
                                    <th class="col-md-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ ($row->type === 'pf')?$row->first_name.' '.$row->last_name:$row->company_name }}</td>
                                    <td>{{ $row->national_id }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        <form action="{{ route('clientes.destroy', ['id' => $row->id]) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <div class="btn-group">
                                                <a href="{{ route('clientes.edit', ['id' => $row->id]) }}" class="btn btn-default btn-outline">Editar</a>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $rows->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Panel -->
    </div>
</div>
@endsection