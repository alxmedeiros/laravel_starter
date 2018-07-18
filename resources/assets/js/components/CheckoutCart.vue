<template>
    <div>
        <div class="row">
            <!-- coluna esquerda -->
            <aside class="col-12 col-sm-6 pl-xl-5">
                <h2 class="nome">{{ this.customer.first_name }}</h2>
                <div class="alert alert-secondary" role="alert">
                    <h5 class="box-titulo">Endereço para entrega</h5>

                    <address-box @selected="this.calculateFrete" :addresses="this.customer.addresses"></address-box>

                </div>
            </aside>

            <!-- coluna direita -->
            <aside class="col-12 col-sm-6 pr-xl-5">
                <div class="alert alert-secondary" role="alert">
                    <table class="sacola-table table table-responsive">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Produtos</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor unitário</th>
                            <th scope="col">Valor total</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in this.cartItems">
                                <td>
                                    <div class="sacola-thumb">
                                        <img src="public/img/produto-tb.jpg" class="d-flex" alt="">
                                        <h6 class="d-flex">{{ item.name }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="sacola-qnt">
                                        <input readonly type="text" class="form-control" v-bind:name="`produto[`+item.rowId+`][amount]`" v-model="item.qty" />
                                        <input type="hidden" v-bind:name="`produto[`+item.rowId+`][product]`" v-model="item.id" />
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ currencyFormat(item.price, 2, 'R$ ') }}</h5>
                                </td>
                                <td>
                                    <h5>{{ currencyFormat(item.price*item.qty, 2, 'R$ ') }}</h5>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    <add-coupon-discount @updated="updateDiscount"></add-coupon-discount>
                                </td>
                            </tr>
                            <!--<tr>-->
                                <!--<td colspan="3"><h5>Subtotal</h5></td>-->
                                <!--<td>{{ currencyFormat($order->total) }}</td>-->
                            <!--</tr>-->

                            <tr>
                                <td><h5>Frete</h5></td>
                                <td colspan="3" class="text-left">
                                    <small v-if="!this.selectedAddress">Selecione um endereço ao lado para o frete ser calculado</small>
                                </td>
                            </tr>

                            <tr v-if="this.selectedAddress">
                                <td colspan="4">
                                    <!--<select v-model="selectedShippingMethod" v-on:change="this.updateTotal">-->
                                        <!--<option value="">Selecione</option>-->
                                        <!--<option v-for="option in this.shippingMethods" v-bind:value="option">-->
                                            <!--{{ option.carrier+' ('+option.description+') R$'+option.price }}-->
                                        <!--</option>-->
                                    <!--</select>-->

                                    <ul>
                                        <li v-for="option in this.shippingMethods" class="ml-1 mb-2">
                                            <div class="form-check d-flex align-items-center">
                                                <input v-bind:id="`shippingMethod_`+option.id" class="form-check-input" type="radio" v-bind:value="option" v-model="selectedShippingMethod" />
                                                <label v-bind:for="`shippingMethod_`+option.id" class="form-check-label w-100">
                                                    <div class="d-flex justify-content-between" style="width: 100%">
                                                        <strong>{{ option.carrier+' ('+option.description+')' }}</strong>
                                                        <span>R$ {{ option.price }}</span>
                                                    </div>
                                                    <div style="width: 100%">
                                                        <span>Prazo estimado de entrega: {{ option.delivery_time }} dias úteis</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>

                                    <input type="hidden" name="shipping[id]" v-model="selectedShippingMethod.id" />
                                    <input type="hidden" name="shipping[delivery_time]" v-model="selectedShippingMethod.delivery_time" />
                                    <input type="hidden" name="shipping[price]" v-model="selectedShippingMethod.price" />

                                </td>
                            </tr>

                            <tr class="bg-total">
                                <td colspan="2"><h4>Total</h4></td>
                                <td colspan="2 text-right"><h4 class="text-right">{{ currencyFormat(total, 2, 'R$ ') }}</h4></td>
                            </tr>
                            <input type="hidden" name="total" v-model="total" />
                        </tbody>
                    </table>
                </div>
            </aside>
        </div>
    </div>
</template>

<script>

    import AddressBox from './AddressBox.vue';
    import AddCouponDiscount from './AddCouponDiscount.vue';
    import {TheMask} from 'vue-the-mask'

    export default {
        props: ['customer', 'cartItems'],
        data() {
            return {
                discountCoupon: 0,
                shippingMethods: [],
                selectedShippingMethod: '',
                selectedAddress: '',
                total: 0,
                items: []
            }
        },
        components: {
            TheMask
        },
        mounted() {
            this.prepareComponent();
        },
        watch: {
            selectedShippingMethod(val, oVal) {
                if ( val !== '' ) {
                    this.updateTotal();
                }
            }
        },
        methods: {
            prepareComponent() {
                console.log('prepareComponent 2');

                this.items = this.cartItems;
                this.setTotal();
            },
            roundFormat: function (value, decimals) {
                return Number(Math.round(value+'e'+decimals)+'e-'+decimals).toFixed(decimals);
            },
            currencyFormat: function (value, decimals, symbol='$') {
                return symbol + this.roundFormat(value,2);
            },
            calculateFrete: function(value) {
                this.selectedAddress = value;

                this.getShippingQuote();
            },
            getShippingQuote: function() {

                axios.get('/cart/shipping/quote/'+this.selectedAddress.postal_code).then(response => {
                    this.shippingMethods = response.data;
                });

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
            updateDiscount: function(value) {
                this.discountCoupon = value;

                this.updateTotal();
            }

        }

    }
</script>
