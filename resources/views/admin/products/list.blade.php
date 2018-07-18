@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="page-content">
        <!-- Panel -->
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="example-wrap">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="col-md-1">#</th>
                                    <th class="col-md-4">Produto</th>
                                    <th class="col-md-2">Preço</th>
                                    <th class="col-md-2">Status</th>
                                    <th class="col-md-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <form action="{{ route('produtos.destroy', ['id' => $row->id]) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <div class="btn-group">
                                                <a href="{{ route('produtos.edit', ['id' => $row->id]) }}" class="btn btn-default btn-outline">Editar</a>
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