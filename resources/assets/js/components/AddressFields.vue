<template>
    <div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="address[postal_code]" class="control-label">CEP</label>
                <div class="row">
                    <div class="col-md-8">
                        <input type="tel" maxlength="8" class="form-control" v-model="newAddress.postal_code" id="address[postal_code]" name="address[postal_code]" />
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" v-bind:class="{'disabled': loading}" v-on:click="searchPostalCode">{{ loading?'Aguarde...':'Buscar CEP' }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <label for="address[street_address]" class="control-label">Endereço</label>
                    <input type="text" class="form-control" v-model="newAddress.street_address" id="address[street_address]" name="address[street_address]" />
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="address[number]" class="control-label">Número</label>
                    <input type="text" class="form-control" id="address[number]" name="address[number]" v-model="newAddress.number" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="address[street_address_complement]" class="control-label">Complemento</label>
                    <input type="text" class="form-control" id="address[street_address_complement]" name="address[street_address_complement]" v-model="newAddress.street_address_complement" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="address[district]" class="control-label">Bairro</label>
                    <input type="text" class="form-control" id="address[district]" name="address[district]" v-model="newAddress.district" />
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="address[region]" class="control-label">Estado</label>
                    <select class="form-control" v-model="newAddress.region" id="address[region]" name="address[region]" v-on:change="this.loadLocalities">
                        <option value="">Selecione</option>
                        <option v-for="option in this.regions" v-bind:value="option.slug">
                            {{ option.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="address[locality]" class="control-label">Cidade</label>
                    <select class="form-control" v-model="newAddress.locality" id="address[locality]" name="address[locality]" :disabled="!this.localities.length">
                        <option value="">Selecione</option>
                        <option v-for="option in this.localities" v-bind:value="option.id">
                            {{ option.name }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import _ from 'lodash';

    export default {
        props: ['address'],
        data() {
            return {
                item: '',
                newAddress: {},
                regions: [],
                localities: [],
                selectedAddress: '',
                loading: false
            }
        },
        mounted() {
            console.log('mounted');
            this.prepareComponent();
        },
        methods: {
            prepareComponent() {
                this.loadRegions();

                if ( this.address !== '' ) {

                    this.newAddress = this.address;

                    if ( this.address.locality ) {
                        this.loadLocalities();
                    }

                    console.log( this.address );
                }

            },
            enableForm: function() {
                this.showForm = true;
            },
            searchPostalCode: function() {

                this.loading = true;

                axios.get('/api/cep/'+this.newAddress.postal_code).then(response => {

                    let item = response.data;

                    if ( item.uf ) {
                        this.newAddress.region = item.uf;

                        let locality = item.localidade || '';

                        this.loadLocalities(locality);
                    }

                    if ( item.logradouro ) {
                        this.newAddress.street_address = item.logradouro;
                    }

                    if ( item.bairro ) {
                        this.newAddress.district = item.bairro;
                    }

                    this.loading = false;

                }).catch(error => {
                    this.loading = false;
                });
            },
            loadRegions: function() {
                axios.get('/api/regions').then(response => {
                    this.regions = response.data;
                });
            },
            loadLocalities: function(locality) {

                locality = locality || '';

                axios.get('/api/region/'+this.newAddress.region+'/localities').then(response => {
                    this.localities = response.data;

                    if ( locality ) {

                        let loc = _.filter( this.localities, function(o) {
                            return o.name == locality;
                        });

                        if ( loc ) {

                            console.log( loc );

                            this.newAddress.locality = loc[0].id;

                        }

                    }

                    console.log( this.newAddress );

                });
            },
            saveAddress: function() {
                console.log( this.newAddress );
                axios.post('/minha-conta/meus-dados/address', this.newAddress )
                    .then(response => {
                        console.log( response.data );
                    });
            },
            selectAddress: function() {
                this.$emit('selected', this.selectedAddress);
            }
        }
    }
</script>
