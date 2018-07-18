<template>
    <div class="form-group" v-bind:class="{ 'has-danger': this.empty }">
        <label for="shipping_address" class="control-label">Endereço para entrega</label>
        <div>
            <select name="shipping_address" id="shipping_address" class="form-control" required v-bind:disabled="this.empty">
                <option value="">Selecione</option>
                <option v-bind:value="item.id" v-for="item in this.items">
                    {{ item.street_address }}, {{ item.number }} -
                    {{ item.district }}, {{ item.cidade.name }}/{{ item.cidade.state }} -
                    CEP: {{ item.postal_code }}
                </option>
            </select>
            <small class="form-control-feedback" v-if="this.empty">Cadastre um endereço para entrega, <a href="/empresas/enderecos/novo">clique aqui</a></small>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['company_id'],
        data() {
            return {
                items: [],
                empty: false
            }
        },
        mounted() {
            this.prepareComponent();
        },
        watch: {
            company_id(val, oVal) {
                if ( val !== '' ) {
                    this.loadAddreses( val );
                }
            }
        },
        methods: {
            prepareComponent() {

            },
            loadAddreses: function(id) {

                axios.get('/empresas/enderecos?company_id='+id)
                    .then(response => {
                        this.items = response.data;

                        if ( this.items.length === 0 ) {
                            this.empty = true;
                        }

                    })
                    .catch(error => {
                        console.log( error );
                    });
            }
        }

    }
</script>
