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
                                    <th class="col-md-4">Cupom</th>
                                    <th class="col-md-2">Uso/Total</th>
                                    <th class="col-md-2">Valor</th>
                                    <th class="col-md-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->coupon_code }}</td>
                                    <td>{{ $row->remaining_qty }}/{{ $row->qty }}</td>
                                    <td>{{ $row->getAmountFormatted() }}</td>
                                    <td>
                                        <form action="{{ route('cupons.destroy', ['id' => $row->id]) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <div class="btn-group">
                                                <a href="{{ route('cupons.edit', ['id' => $row->id]) }}" class="btn btn-default btn-outline">Editar</a>
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