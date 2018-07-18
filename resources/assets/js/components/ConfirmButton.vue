<template>
    <div>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmModal">
            <i class="fa fa-trash"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                    </div>
                    <div class="modal-body">
                        Você tem certeza que deseja excluir este item? <strong>Você não poderá recuperar este registro.</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" v-on:click="confirm">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['url'],
        data() {
            return {
                item: ''
            }
        },
        mounted() {
            console.log('mounted');
            this.prepareComponent();
        },
        methods: {
            prepareComponent() {
                console.log('prepareComponent');
            },
            confirm: function(e) {

                e.preventDefault();

                window.location = this.url;

            }
        }

    }

</script>
