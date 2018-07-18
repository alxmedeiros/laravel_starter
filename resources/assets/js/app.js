require('./bootstrap');

window.Vue = require('vue');

import VueTheMask from 'vue-the-mask';
import {VMoney} from 'v-money'

Vue.use(VueTheMask);

const plupload = require('./components/PlUpload.vue');
Vue.component('v-plupload', Vue.extend(plupload));

Vue.component('AddressFields', require('./components/AddressFields.vue'));
Vue.component('OrderItem', require('./components/OrderItem.vue'));
Vue.component('EstadoCidadeAdm', require('./components/EstadoCidade.vue'));
Vue.component('AddressSelect', require('./components/AddressSelect.vue'));
Vue.component('ConfirmButton', require('./components/ConfirmButton.vue'));

const app = new Vue({
    el: '#app',
    data: {
        type: '',
        price: '0',
        wholesale_price: '0',
        auto_coupon_code: 0,
        amount_type: 'amount',
        discountCoupon: false,
        money: {
            decimal: ',',
            thousands: '.',
            prefix: 'R$ ',
            precision: 2,
            masked: false
        },
        percent: {
            decimal: ',',
            thousands: '.',
            suffix: '%',
            precision: 2,
            masked: false
        },
        summernoteOptions: {
            "height": 100,
            "toolbar": [
                ['style', ['bold', 'italic', 'underline', 'clear']],
            ]
        },
        thumbnail_field: 'thumbnail',
        datepickerOptions: {
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        },
        selectedOrders: [],
        product: '',
        payment_method: '',
        company: '',
        companyId: '',
        status_type: ''
    },
    directives: {
        money: VMoney
    }
});
