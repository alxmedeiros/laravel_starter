<template>
    <div v-if="base_amount !== ''">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Código</th>
                    <th class="text-uppercase col-md-4">Produto</th>
                    <th>Valor Unitário</th>
                    <th>Valor R$</th>
                    <th class="col-md-2">Qtde. de caixas</th>
                    <th>Subtotal R$</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, index) in items">
                    <td>{{ item.id }}</td>
                    <td>
                        <div class="sacola-thumb">
                            <img :src="item.thumbnail" class="d-flex" alt="" />
                            <h6 class="d-flex">{{ item.name | capitalize }}</h6>
                        </div>
                    </td>
                    <td>{{ base_amount > 0?currencyFormat(base_amount/25, 2, 'R$ '):currencyFormat(item.wholesale_price/25, 2, 'R$ ') }}</td>
                    <td>{{ base_amount > 0?currencyFormat(base_amount, 2, 'R$ '):currencyFormat(item.wholesale_price, 2, 'R$ ') }}</td>
                    <td><input type="text" class="form-control" v-bind:name="`produto[`+item.id+`][qty]`" v-model="item.qty" @blur="updateQty(item, index)" /></td>
                    <td>{{ currencyFormat(item.subtotal || 0, 2, 'R$ ') }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="text-right clearfix">
            <div class="float-right">
                <p class="page-invoice-amount">Total:
                    <span>{{ currencyFormat(total, 2, 'R$ ') }}</span>
                    <input type="hidden" name="total" v-model="this.total" />
                    <input type="hidden" name="subtotal" v-model="this.total" />
                    <input type="hidden" name="total_paid" v-model="this.total" />
                    <input type="hidden" name="total_qty_ordered" v-model="this.total_qty" />
                </p>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        props: ['products', 'company'],
        data() {
            return {
                items: [],
                total: 0,
                total_qty: 0,
                base_amount: '',
                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: 'R$ ',
                    precision: 2
                }
            }
        },
        mounted() {
            this.prepareComponent();
        },
        watch: {
            company(val, oVal) {
                console.log('cupdate', val);

                axios.get('/api/company/'+val).then(response => {
                    this.base_amount = response.data.data.base_price;
                    console.log( response.data.data );
                });
            }
        },
        methods: {
            prepareComponent() {
                this.items = this.products;

                console.log( 'company', this.company );

                this.items.map(function(value) {
                    value.qty = 0;
                    value.subtotal = 0;
                });
//                this.setTotal();
            },
            roundFormat: function (value, decimals) {
                return Number(Math.round(value+'e'+decimals)+'e-'+decimals).toFixed(decimals);
            },
            currencyFormat: function (value, decimals, symbol='$') {
                return symbol + this.roundFormat(value,2);
            },
            updateQty: function(item) {

                let price = (this.base_amount>0)?this.base_amount:item.wholesale_price;

                item.subtotal = parseInt(item.qty) * price;

                this.updateTotal();
            },
            updateTotal: function() {
                this.total = 0;
                this.total_qty = 0;

                this.setTotal();
            },
            setTotal: function() {

                let root = this;

                this.items.map(function(value) {
                    root.total_qty += parseInt(value.qty);
                    root.total += parseFloat(value.subtotal);
                });

            }

        }

    }
</script>
