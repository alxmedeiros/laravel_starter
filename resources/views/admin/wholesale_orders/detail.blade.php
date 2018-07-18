@extends('admin.layouts.app')

@section('content')
<div class="page">

    @include('admin.layouts.partials.page-header')

    <div class="panel">

            <div class="panel-body container-fluid">

                <div class="row">
                    <div class="col-lg-4">
                        <h3>Dados da empresa</h3>
                        <p>
                            <a class="font-size-20" href="" title="Ver cliente">
                                {{ $row->company->business_name }}
                            </a>
                            <br /> E-mail: <span class="font-size-20">{{ $row->company->email }}</span>
                            <br /> CNPJ: <span class="font-size-20">{{ $row->company->national_id }}</span>
                            <br />
                            <abbr title="Phone">Telefone:</abbr> <span class="font-size-20">{{ $row->company->business_phone }}</span>
                            <br />
                            <abbr title="Phone">Celular:</abbr> <span class="font-size-20">{{ $row->company->cellphone }}</span>
                            <br />
                            <br />
                            {{--<span class="font-size-20">Endereço</span>--}}
                            {{--<address>--}}
                                {{--{{ $row->company->addresses[0]->street_address }}, {{ $row->company->addresses[0]->number }} - {{ $row->company->addresses[0]->district }}--}}
                                {{--<br> {{ $row->company->addresses[0]->cidade->name }}, {{ $row->company->addresses[0]->cidade->state }}, {{ $row->company->addresses[0]->postal_code }}--}}
                            {{--</address>--}}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h4>Dados do Pedido</h4>
                        <p>
                            <a class="font-size-20" href="javascript:void(0)">#{{ str_pad($row->id, 6, "0", STR_PAD_LEFT) }}</a>
                        </p>
                        <span>Data do pedido: {{ $row->created_at->format('d/m/Y') }}</span>
                        <br />
                        <p class="font-size-20">
                            <span>Valor do pedido: </span>{{ formatCurrency($row->total) }}
                        </p>

                    </div>
                </div>

                @if (session('flashMessage'))
                    <div class="alert alert-danger m-t-lg">
                        {{ session('flashMessage') }}
                    </div>
                @endif

            <form class="form-validate" method="post"
                      action="{{ isset($id)?route('pedidos_empresa.update', ['id' => $id]):route('pedidos_empresa.store') }}" enctype=multipart/form-data>
                    {{ isset($id)?method_field('PUT'):'' }}
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-4">

                        <h4>Forma de pagamento</h4>

                        <div>
                            <div class="form-group">
                                <label for="payment_method" class="control-label">Forma de pagamento</label>
                                <div>
                                    <select name="payment_method" id="payment_method" class="form-control" v-model="payment_method">
                                        <option value="">Selecione</option>
                                        <option value="boleto" {{ (isset($row) && $row->payment_method=='boleto')?'selected':'' }}>Boleto</option>
                                        <option value="cartao_credito" {{ (isset($row) && $row->payment_method=='cartao_credito')?'selected':'' }}>Cartão de crédito</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" v-if="payment_method === 'boleto'">
                                <label for="url_boleto" class="control-label">Envie o Boleto</label>
                                <?php if( !$row->url_boleto ) : ?>
                                <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                    <input type="text" class="form-control" readonly/>
                                    <span class="input-group-btn">
                                <span class="btn btn-outline btn-file">
                                    <i class="icon wb-upload" aria-hidden="true"></i>
                                    <input type="file" name="url_boleto"/>
                                </span>
                            </span>
                                </div>
                                <?php else: ?>
                                <div class="checkbox-custom checkbox-primary">
                                    <input type="checkbox" id="removeUrlBoleto" name="removeUrlBoleto">
                                    <label for="removeUrlBoleto">Remover BOLETO</label>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <h4>Nota Fiscal</h4>

                        <div class="form-group">
                            <label for="nfe_xml" class="control-label">XML da Nota fiscal</label>
                            <?php if( !$row->nfe_xml ) : ?>
                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                <input type="text" class="form-control" readonly/>
                                <span class="input-group-btn">
                                <span class="btn btn-outline btn-file">
                                    <i class="icon wb-upload" aria-hidden="true"></i>
                                    <input type="file" name="nfe_xml"/>
                                </span>
                            </span>
                            </div>
                            <?php else: ?>
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="removeNfeXml" name="removeXml">
                                <label for="removeNfeXml">Remover XML</label>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="nfe_pdf" class="control-label">PDF da Nota fiscal</label>
                            <?php if( !$row->nfe_pdf ) : ?>
                            <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                <input type="text" class="form-control" readonly/>
                                <span class="input-group-btn">
                                <span class="btn btn-outline btn-file">
                                    <i class="icon wb-upload" aria-hidden="true"></i>
                                    <input type="file" name="nfe_pdf"/>
                                </span>
                            </span>
                            </div>
                            <?php else: ?>
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="removeNfePdf" name="removePdf">
                                <label for="removeNfePdf">Remover PDF</label>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <h4>Intecon</h4>

                        <div class="form-group">
                            <label for="cnpj_transportadora" class="control-label">CNPJ da transportadora</label>
                            <input type="text" class="form-control" id="cnpj_transportadora" name="cnpj_transportadora" value="{{ old('cnpj_transportadora', isset($row) ? $row->cnpj_transportadora : '') }}" />
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-primary">Atualizar pedido</button>
                    </div>
                </div>

            </form>
                
                <div class="row">
                    <div class="col-md-12">
                        {{ $row->observacao }}
                    </div>
                </div>

                <div class="page-invoice-table table-responsive">
                    <table class="table table-hover text-right">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Descrição</th>
                                <th class="text-right">Quantidade</th>
                                <th class="text-right">Custo R$</th>
                                <th class="text-right">Total R$</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($row->items as $index => $rowItem)
                            <tr>
                                <td class="text-center">
                                    {{ $index+1 }}
                                </td>
                                <td class="text-left">
                                    {{ $rowItem->name }}
                                </td>
                                <td>
                                    {{ $rowItem->qty  }}
                                </td>
                                <td>
                                    {{ formatCurrency($rowItem->price) }}
                                </td>
                                <td>
                                    {{ formatCurrency($rowItem->getTotal()) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-right clearfix">
                    <div class="float-right">
                        <p>Subtotal: <span>{{ formatCurrency($row->total-$row->shipping_amount+$row->discount_amount) }}</span></p>
                        <p>Desconto: <span>{{ formatCurrency($row->discount_amount) }}</span></p>
                        <p>Frete: <span>{{ formatCurrency($row->shipping_amount) }}</span></p>

                        <p class="page-invoice-amount">Total: <span>{{ formatCurrency($row->total) }}</span></p>
                    </div>
                </div>

            </div>


    </div>
</div>
@endsection