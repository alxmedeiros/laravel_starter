<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="region" class="control-label">Estado</label>
                <select class="form-control" v-model="newAddress.region" id="region" name="region" v-on:change="this.loadLocalities" required>
                    <option value="">Selecione</option>
                    <option v-for="option in this.regions" v-bind:value="option.slug">
                        {{ option.name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="locality" class="control-label">Cidade</label>
                <select class="form-control" v-model="newAddress.locality" id="locality" name="locality" :disabled="!this.localities.length" required>
                    <option value="">Selecione</option>
                    <option v-for="option in this.localities" v-bind:value="option.id">
                        {{ option.name }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>

    import _ from 'lodash';

    export default {
        props: ['errors', 'region', 'locality'],
        data() {
            return {
                newAddress: {},
                regions: [],
                localities: []
            }
        },
        mounted() {
            this.prepareComponent();
        },
        methods: {
            prepareComponent() {
                this.loadRegions();

                if ( this.region ) {
                    this.newAddress.region = this.region;
                    this.loadLocalities();
                }

                if ( this.locality ) {
                    this.newAddress.locality = this.locality;
                }

                console.log( 'aqui', this.errors, this.region, this.locality );
            },
            loadRegions: function() {

                let parent = this;

                axios.get('/api/regions').then(response => {
                    parent.regions = response.data;
                });
            },
            loadLocalities: function() {

                let parent = this;

                axios.get('/api/region/'+this.newAddress.region+'/localities').then(response => {
                    parent.localities = response.data;
                });
            }
        }

    }
</script>
