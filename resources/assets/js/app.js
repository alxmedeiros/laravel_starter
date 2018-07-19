require('./bootstrap');

window.Vue = require('vue');

import VueTheMask from 'vue-the-mask';
import {VMoney} from 'v-money'

Vue.use(VueTheMask);

const plupload = require('./components/PlUpload.vue');
Vue.component('v-plupload', Vue.extend(plupload));

Vue.component('EstadoCidade', require('./components/EstadoCidade.vue'));
Vue.component('ConfirmButton', require('./components/ConfirmButton.vue'));

const app = new Vue({
    el: '#app',
    data: {
        thumbnail_field: 'thumbnail',
        datepickerOptions: {
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        }
    },
    directives: {
        money: VMoney
    }
});
