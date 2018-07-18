<template>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Panel With Input Group</h3>
            <div class="panel-actions">
                <div class="input-search input-group-sm">
                    <button type="submit" class="input-search-btn">
                        <i class="icon wb-search" aria-hidden="true"></i>
                    </button>
                    <input type="text" class="form-control" name="" placeholder="Search...">
                </div>
            </div>
        </div>
        <ul class="list-group list-group-bordered">
            <li class="list-group-item">Dapibus ac facilisis</li>
            <li class="list-group-item">Morbi leo risus</li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
