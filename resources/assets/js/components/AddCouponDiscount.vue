<template>
    <div>
        <div class="row">
            <div class="form-group">
                <input type="text" name="coupon" class="form-control" v-model="coupon" placeholder="Cupom de desconto" />
                <small class="help-block text-danger" v-if="error !== ''">{{ error }}</small>
                <small class="help-block text-primary" v-if="success !== ''">{{ success }}</small>
            </div>
            <div class="form-group">
                <button type="button" v-on:click="this.getCouponByCode" class="btn btn-roxo mx-0 my-0">ok</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                coupon: '',
                error: '',
                success: '',
                discountCoupon: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            enable: function() {
                this.discountCoupon = true
            },
            getCouponByCode() {
                axios.get('/cart/coupon/'+this.coupon)
                    .then(response => {

                        let discount = response.data;

                        this.$emit('updated', discount);

                        if ( discount.amount_type === 'amount' ) {
                            this.success = 'Desconto de R$ '+discount.amount;
                        } else {
                            this.success = 'Desconto de '+discount.amount+'%';
                        }

                        this.error = '';
                    })
                    .catch(error => {
                        this.error = error.response.data;
                        this.success = '';
                        this.$emit('updated', 0);
                    });
            },

        }

    }
</script>
