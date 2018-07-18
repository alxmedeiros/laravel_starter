@extends('customer.layouts.app')

@section('content')
    <div class="page">
        <div class="page-header">
            <h1 class="page-title font-size-26 font-weight-100">Endereços Cadastrados</h1>
            <div class="page-header-actions">
                <a href="{{ route('customer.address.new') }}" class="btn btn-round btn-primary btn-lg">
                    Novo Endereço
                </a>
            </div>
        </div>
        <div class="page-content">

            <div class="row">
                <div class="col-12">

                    @if (session('success'))
                        <div class="alert alert-success m-t-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="list-group">
                    @foreach($customer->addresses as $row)
                        <a class="list-group-item flex-column align-items-start" href="{{ route('customer.address.edit', ['id' => $row->id]) }}">
                            {{--<h4 class="list-group-item-heading mt-0 mb-5">List 2</h4>--}}
                            <p class="mb-0">
                                {{ $row->street_address }}, {{ $row->number }}<br />
                                {{ $row->district }}, {{ $row->cidade->name }}/{{ $row->cidade->state }}<br />
                                CEP: {{ $row->postal_code }}
                            </p>
                        </a>
                    @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection