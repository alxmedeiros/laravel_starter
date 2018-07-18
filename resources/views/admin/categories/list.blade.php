@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="page-content">
        <!-- Panel -->
        <div class="panel">
            <div class="panel-body container-fluid">

                <div class="row">
                    <div class="col-md-4">
                        <h4>Categorias cadastradas</h4>
                        <div class="dd" data-plugin="nestable">
                            <ol class="dd-list">
                            @foreach($rows as $category)
                                <li class="dd-item" data-id="{{ $category->id }}">
                                    <div class="dd-handle">
                                        {{ $category->name }}
                                        <div class="float-right">
                                            <div>
                                                <a href="{{ route('categorias.edit', ['id' => $category->id]) }}" class="text-info m-r-md">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @if ( $category->id !== 1 )
                                                <a href="1" class="text-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                                {{--<li class="dd-item" data-id="3">--}}
                                    {{--<div class="dd-handle">--}}
                                        {{--ITEM 3--}}
                                    {{--</div>--}}
                                    {{--<ol class="dd-list">--}}
                                        {{--<li class="dd-item" data-id="4">--}}
                                            {{--<div class="dd-handle">ITEM 4</div>--}}
                                        {{--</li>--}}
                                        {{--<li class="dd-item" data-id="5" data-foo="bar">--}}
                                            {{--<div class="dd-handle">ITEM 5</div>--}}
                                        {{--</li>--}}
                                    {{--</ol>--}}
                                {{--</li>--}}
                                {{--<li class="dd-item" data-id="6">--}}
                                    {{--<div class="dd-handle">ITEM 6</div>--}}
                                    {{--<ol class="dd-list">--}}
                                        {{--<li class="dd-item" data-id="7">--}}
                                            {{--<div class="dd-handle">ITEM 7</div>--}}
                                            {{--<ol class="dd-list">--}}
                                                {{--<li class="dd-item" data-id="8">--}}
                                                    {{--<div class="dd-handle">ITEM 8</div>--}}
                                                {{--</li>--}}
                                            {{--</ol>--}}
                                        {{--</li>--}}
                                    {{--</ol>--}}
                                {{--</li>--}}
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4>
                            @isset( $id )
                                Editar categoria
                            @else
                                Nova categoria
                            @endif
                        </h4>
                        <form class="form-validate" method="post"
                              action="{{ isset($id)?route('categorias.update', ['id' => $id]):route('categorias.store') }}">
                            {{ isset($id)?method_field('PUT'):'' }}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="form-group col-md-6{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="control-label" for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ old('name', isset($row) ? $row->name : '') }}" data-fv-notempty>
                                    @if ($errors->has('name'))
                                        <small class="form-control-feedback">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-6{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="control-label" for="category_id">Categoria pai</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Selecione</option>
                                    @foreach($rows as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                    {{--<input type="email" class="form-control" id="email" name="email"--}}
                                           {{--value="{{ old('email', isset($row) ? $row->email : '') }}" data-fv-notempty data-fv-emailaddress>--}}
                                    @if ($errors->has('category_id'))
                                        <small class="form-control-feedback">{{ $errors->first('category_id') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button name="save" type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{--<div class="table-responsive">--}}
                        {{--<table class="table table-striped table-hover">--}}
                            {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th class="col-md-1">#</th>--}}
                                    {{--<th class="col-md-5">Nome</th>--}}
                                    {{--<th class="col-md-4">E-mail</th>--}}
                                    {{--<th class="col-md-2">Ações</th>--}}
                                {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($rows as $row)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $row->id }}</td>--}}
                                    {{--<td>{{ $row->name }}</td>--}}
                                    {{--<td>{{ $row->email }}</td>--}}
                                    {{--<td>--}}
                                        {{--<form action="{{ route('administradores.destroy', ['id' => $row->id]) }}" method="POST">--}}
                                            {{--{{ method_field('DELETE') }}--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--<div class="btn-group">--}}
                                                {{--<a href="{{ route('administradores.edit', ['id' => $row->id]) }}" class="btn btn-default btn-outline">Editar</a>--}}
                                                {{--<button type="submit" class="btn btn-danger">--}}
                                                    {{--<i class="fa fa-trash"></i>--}}
                                                {{--</button>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}

                        {{--{{ $rows->links() }}--}}
                    {{--</div>--}}
            </div>
        </div>
        <!-- End Panel -->
    </div>
</div>
@endsection