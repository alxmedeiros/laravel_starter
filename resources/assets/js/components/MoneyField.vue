<template>
    <div>
        <money v-model="priceModel" v-bind="money" v-bind:name="name" v-bind:id="name" class="form-control"></money>
    </div>
</template>
<script>
    import {Money} from 'v-money'

    export default{
        name: 'moneyField',
        props: ['price','money','name'],
        data () {
          return {
              priceModel: ''
          }
        },
        components:{
            Money
        },
        mounted() {
            this.prepareComponent();
        },
        methods: {
            prepareComponent() {
                this.priceModel = this.price;
            }
        }
    }
</script>
