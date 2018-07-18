<template>
    <div class="sacola-content">
        <div class="container">
            <div v-if="this.items.length">
                <table class="sacola-table table table-responsive">
                    <thead>
                        <tr>
                        <th scope="col">Produtos</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor unitário</th>
                        <th scope="col">Valor total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in this.getItems()">
                            <td>
                                <div class="sacola-thumb">
                                    <img :src="item.thumbnail" class="d-flex" alt="" />
                                    <h6 class="d-flex">{{ item.name | capitalize }}</h6>
                                    <input type="hidden" v-model="item.rowId" class="cartItem" />
                                    <input type="hidden" v-bind:name="`produto[`+item.rowId+`][product]`" v-model="item.id" />
                                </div>
                            </td>
                            <td>
                                <div class="sacola-qnt">
                                    <input type="text" class="form-control" v-bind:name="`produto[`+item.rowId+`][amount]`" v-model="item.qty" @blur="updateQty(item, index)" />
                                    <!--<a href="{{ route('cart.remove', ['id' => $index]) }}" class="btn-remover" title="Retirar do carrinho">X</a>-->
                                </div>
                            </td>
                            <td>
                                <h5>{{ currencyFormat(item.price, 2, 'R$ ') }}</h5>
                            </td>
                            <td>
                                <h5>{{ currencyFormat(item.subtotal, 2, 'R$ ') }}</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class=" col-12 col-sm-6">
                        <div class="sacola-frete d-flex py-4 px-5 p-sm-5">
                            <p>Simule o prazo de entrega e o frete para seu CEP abaixo:</p>
                            <div class="form-inline form-group">
                                <!--<input type="text" class="form-control" v-model="postal_code" />-->
                                <the-mask :mask="['#####-###']" class="form-control" v-model="postal_code" />
                                <button type="button" v-on:click="this.getShippingQuote" class="btn btn-roxo mx-0 my-0 update-shipping">ok</button>
                            </div>

                            <input type="hidden" name="shipping[id]" v-model="selectedShippingMethod.id" />
                            <input type="hidden" name="shipping[delivery_time]" v-model="selectedShippingMethod.delivery_time" />
                            <input type="hidden" name="shipping[price]" v-model="selectedShippingMethod.price" />

                            <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm" target="_blank" title="Não sei meu CEP">Não sei meu CEP</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="sacola-total d-flex py-4 px-5">
                            <table class="sacola-total-table table mb-0">
                                <tr>
                                    <td>
                                        Frete:
                                    </td>
                                    <td>
                                        <select v-model="selectedShippingMethod" v-on:change="this.updateTotal">
                                            <option value="">Selecione</option>
                                            <option v-for="option in this.shippingMethods" v-bind:value="option">
                                                {{ option.carrier + ' - '+option.description+' - R$'+option.price+' - '+option.delivery_time+' dias úteis' }}
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <add-coupon-discount @updated="updateDiscount"></add-coupon-discount>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="total">{{ currencyFormat(this.total, 2, 'R$ ') }}</td>
                                    <input type="hidden" name="total" v-model="this.total" />
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6">
                        <a href="/produtos/" class="btn btn-lg btn-roxo" title="">Continuar comprando</a>
                    </div>
                    <div class="col-12 col-sm-6">
                        <button class="btn btn-lg btn-verde2 float-left float-sm-right" title="">Continuar</button>
                    </div>
                </div>

            </div>
            <p v-if="!this.items.length">Nenhum item na sacola de compras</p>
        </div>
    </div>
</template>

<script>

    import AddCouponDiscount from './AddCouponDiscount.vue';
    import {VMoney} from 'v-money';
    import {TheMask} from 'vue-the-mask'
    import _ from 'lodash';

    export default {
        props: ['cartItems'],
        data() {
            return {
                discountCoupon: 0,
                postal_code: '',
                items: [],
                total: 0,
                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: 'R$ ',
                    precision: 2
                },
                shippingMethods: [],
                selectedShippingMethod: ''
            }
        },
        components: {
            TheMask
        },
        directives: {
            money: VMoney
        },
        mounted() {
            this.prepareComponent();
        },
        methods: {
            prepareComponent() {
                this.items = JSON.parse( this.cartItems );
                this.setTotal();
            },
            roundFormat: function (value, decimals) {
                return Number(Math.round(value+'e'+decimals)+'e-'+decimals).toFixed(decimals);
            },
            currencyFormat: function (value, decimals, symbol='$') {
                return symbol + this.roundFormat(value,2);
            },
            updateQty: function(item, index) {
                console.log('updateQty');

                item.subtotal = item.qty * item.price;

                this.updateItem(item);

                this.updateTotal();
            },
            updateItem: function(item) {
                var _this = this;
                axios.post('/cart/update', item).then(function (response) {
                    _this.items = response.data;
                    _this.updateTotal();
                });
            },
            getItems: function() {
                return this.items;
            },
            updateTotal: function() {
                this.total = 0;

                this.setTotal();
            },
            setTotal: function() {

                let root = this;

                this.items.map(function(value) {
                    root.total += value.subtotal;
                });

                if ( this.discountCoupon !== 0 ) {
                    if ( this.discountCoupon.amount_type === 'amount' ) {
                        this.total -= parseFloat( this.discountCoupon.amount );
                    } else {
                        this.total -= parseFloat( (this.total*this.discountCoupon.amount)/100 );
                    }
                }

                if ( this.selectedShippingMethod !== '' ) {
                    this.total += parseFloat( this.selectedShippingMethod.price );
                }

            },
            getShippingQuote: function() {

                console.log( this.postal_code );
                axios.get('/cart/shipping/quote/'+this.postal_code).then(response => {
                    this.shippingMethods = response.data;
                })
            },
            updateDiscount: function(value) {
                this.discountCoupon = value;

                this.updateTotal();
            }

        }

    }
</script>
