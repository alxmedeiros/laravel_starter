<template>
    <div class="row">
        <div class="col-lg-4">

            <h4>Forma de pagamento</h4>

            <div>
                <div class="form-group">
                    <label for="payment_method" class="control-label">Forma de pagamento</label>
                    <div>
                        <select name="payment_method" id="payment_method" class="form-control" v-model="payment_method">
                            <option value="">Selecione</option>
                            <option value="boleto">Boleto</option>
                            <option value="cartao_credito">Cartão de crédito</option>
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
</template>

<script>

    import _ from 'lodash';

    export default {
        props: ['row'],
        data() {
            return {
                selectedShippingMethod: ''
            }
        },
        mounted() {
            this.prepareComponent();
        },
        methods: {
            prepareComponent() {
//                this.items = JSON.parse( this.cartItems );
//                this.setTotal();
            },
//            roundFormat: function (value, decimals) {
//                return Number(Math.round(value+'e'+decimals)+'e-'+decimals).toFixed(decimals);
//            },
//            currencyFormat: function (value, decimals, symbol='$') {
//                return symbol + this.roundFormat(value,2);
//            },
//            updateQty: function(item, index) {
//
//                item.subtotal = item.qty * item.price;
//
//                this.updateItem(item);
//
//                this.updateTotal();
//            },
//            updateItem: function(item) {
//
//                axios.post('/cart/update', item).then(response => {
//                    console.log( response );
//                });
//
//            },
//            getItems: function() {
//                return this.items;
//            },
//            updateTotal: function() {
//                this.total = 0;
//
//                this.setTotal();
//            },
//            setTotal: function() {
//
//                let root = this;
//
//                this.items.map(function(value) {
//                    root.total += value.subtotal;
//                });
//
//                if ( this.discountCoupon !== 0 ) {
//                    if ( this.discountCoupon.amount_type === 'amount' ) {
//                        this.total -= parseFloat( this.discountCoupon.amount );
//                    } else {
//                        this.total -= parseFloat( (this.total*this.discountCoupon.amount)/100 );
//                    }
//                }
//
//                if ( this.selectedShippingMethod !== '' ) {
//                    this.total += parseFloat( this.selectedShippingMethod.price );
//                }
//
//            },
//            getShippingQuote: function() {
//
//                console.log( this.postal_code );
//                axios.get('/cart/shipping/quote/'+this.postal_code).then(response => {
//                    this.shippingMethods = response.data;
//                })
//            },
//            updateDiscount: function(value) {
//                this.discountCoupon = value;
//
//                this.updateTotal();
//            }

        }

    }
</script>
