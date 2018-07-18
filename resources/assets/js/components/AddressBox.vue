<template>
    <div>
        <input type="hidden" name="shipping_address" :value="selectedAddress.id" />
        <div class="form-check ml-4" v-for="(item, index) in this.addresses">
            <input class="form-check-input" type="radio" v-bind:id="`shipping_address_`+item.id" v-on:change="selectAddress" :value="item" v-model="selectedAddress" />
            <label class="form-check-label" v-bind:for="`shipping_address_`+item.id">
                {{ item.street_address }}, {{ item.number }}<br />
                {{ item.district }}, {{ item.cidade.name }}/{{ item.cidade.state }}<br />
                CEP: {{ item.postal_code }}
            </label>
        </div>
        <div v-if="!this.addresses">Você ainda não possui endereço cadastrado</div>

        <!--<div v-if="this.showForm">-->
            <!--<div class="row">-->
                <!--<div class="col-4">-->
                    <!--<div class="form-group">-->
                        <!--<label for="postal_code" class="control-label">CEP</label>-->
                        <!--&lt;!&ndash;<input type="text" class="form-control" name="postal_code" id="postal_code" />&ndash;&gt;-->
                        <!--<the-mask id="postal_code" :mask="['#####-###']" class="form-control" v-model="newAddress.postal_code" />-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->

            <!--<div class="row">-->
                <!--<div class="col-sm-9">-->
                    <!--<div class="form-group">-->
                        <!--<label for="street_address" class="control-label">Endereço</label>-->
                        <!--<input type="text" class="form-control" v-model="newAddress.street_address" id="street_address" />-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-sm-3">-->
                    <!--<div class="form-group">-->
                        <!--<label for="number" class="control-label">Número</label>-->
                        <!--<input type="text" class="form-control" id="number" v-model="newAddress.number" />-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->

            <!--<div class="row">-->
                <!--<div class="col-sm-12">-->
                    <!--<div class="form-group">-->
                        <!--<label for="street_address_complement" class="control-label">Complemento</label>-->
                        <!--<input type="text" class="form-control" id="street_address_complement" v-model="newAddress.street_address_complement" />-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->

            <!--<div class="row">-->
                <!--<div class="col-sm-4">-->
                    <!--<div class="form-group">-->
                        <!--<label for="district" class="control-label">Bairro</label>-->
                        <!--<input type="text" class="form-control" id="district" v-model="newAddress.district" />-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-sm-4">-->
                    <!--<div class="form-group">-->
                        <!--<label for="region" class="control-label">Estado</label>-->
                        <!--<select class="form-control" v-model="newAddress.region" id="region" v-on:change="this.loadLocalities">-->
                            <!--<option value="">Selecione</option>-->
                            <!--<option v-for="option in this.regions" v-bind:value="option.slug">-->
                                <!--{{ option.name }}-->
                            <!--</option>-->
                        <!--</select>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-sm-4">-->
                    <!--<div class="form-group">-->
                        <!--<label for="locality" class="control-label">Cidade</label>-->
                        <!--<select class="form-control" v-model="newAddress.locality" id="locality" :disabled="!this.localities.length">-->
                            <!--<option value="">Selecione</option>-->
                            <!--<option v-for="option in this.localities" v-bind:value="option.id">-->
                                <!--{{ option.name }}-->
                            <!--</option>-->
                        <!--</select>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->

            <!--<button type="button" v-on:click="this.disabledForm" class="btn btn-verde2" style="margin-right: 20px" :disabled="this.formSubmitted">Cancelar</button>-->
            <!--<button type="button" v-on:click="this.saveAddress" class="btn btn-roxo" :disabled="this.formSubmitted">Salvar endereço</button>-->
        <!--</div>-->

        <!--<a href="javascript:void(0)" v-on:click="this.enableForm" v-if="!this.showForm" title="" class="btn btn-roxo">Adicionar <span v-if="this.addresses">outro </span>endereço</a>-->
    </div>
</template>

<script>

    import {TheMask} from 'vue-the-mask';
    import _ from 'lodash';

    export default {
        props: ['addresses'],
        data() {
            return {
                item: '',
                showForm: false,
                newAddress: {},
                regions: [],
                localities: [],
                selectedAddress: '',
                loadedAddresses: [],
                formSubmitted: false
            }
        },
        mounted() {
            this.prepareComponent();
        },
        methods: {
            prepareComponent() {
//                this.loadRegions();

                this.selectedAddress = this.addresses.length===1?this.addresses[0]:'';

                if ( this.selectedAddress !== '' ) {
                    this.selectAddress();
                }

//                this.populateAddress( this.addresses );
            },
//            enableForm: function() {
//                this.showForm = true;
//            },
//            disabledForm: function() {
//                this.showForm = false;
//            },
//            toogleLoading: function() {
//                this.formSubmitted = !this.formSubmitted;
//            },
            populateAddress: function(data) {
                let temp = this.addresses;

                temp.push(data);

                this.addresses = temp;

                this.newAddress = {};
            },
//            loadRegions: function() {
//                axios.get('/api/regions').then(response => {
//                    this.regions = response.data;
//                });
//            },
//            loadLocalities: function() {
//                axios.get('/api/region/'+this.newAddress.region+'/localities').then(response => {
//                    this.localities = response.data;
//                });
//            },
//            saveAddress: function() {
//
//                let parent = this;
//
//                this.toogleLoading();
//
//                axios.post('/minha-conta/meus-dados/address', this.newAddress )
//                    .then(response => {
//                        parent.disabledForm();
//                        parent.populateAddress( response.data.data );
//                        parent.toogleLoading();
//                    });
//            },
            selectAddress: function() {
                this.$emit('selected', this.selectedAddress);
            }

        }

    }
</script>
