@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="page-content">
        <!-- Panel -->
        <div class="panel">
            <div class="panel-body container-fluid">

                <form action="{{ route('empresas.index') }}" method="GET" class="filters">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input type="search" id="search" name="search" class="form-control" placeholder="Pesquisar por Razão Social/Nome fantasia/CNPJ" />
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
                                    <th class="col-md-4">Razão Social</th>
                                    <th class="col-md-3">CNPJ</th>
                                    <th class="col-md-2">Status</th>
                                    <th class="col-md-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->company_name }}</td>
                                    <td>{{ $row->national_id }}</td>
                                    <td><span class="badge {{ $row->status=='active'?'badge-success':'badge-warning' }}">{{ $row->status=='active'?'Ativa':'Inativa' }}</span></td>
                                    <td>
                                        <form action="{{ route('empresas.destroy', ['id' => $row->id]) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <div class="btn-group">
                                                <a href="{{ route('empresas.edit', ['id' => $row->id]) }}" class="btn btn-default btn-outline"><i class="fa fa-search"></i></a>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
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