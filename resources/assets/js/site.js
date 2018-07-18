require('./bootstrap');

window.Vue = require('vue');

import VueTheMask from 'vue-the-mask';
import {VMoney} from 'v-money';

// Vue.use(VueI18n);
Vue.use(VueTheMask);

Vue.component('AddCouponDiscount', require('./components/AddCouponDiscount.vue'));
Vue.component('CartItemsTable', require('./components/CartItemsTable.vue'));
Vue.component('AddressBox', require('./components/AddressBox.vue'));
Vue.component('CheckoutCart', require('./components/CheckoutCart.vue'));

Vue.component('OrderItem', require('./components/OrderItem.vue'));
Vue.component('AddressSelect', require('./components/AddressSelect.vue'));
Vue.component('EstadoCidade', require('./components/EstadoCidade.vue'));

Vue.filter('capitalize', function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
});

const app = new Vue({
    el: '#app',
    data: {
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
        cartItems: [],
        addresses: '',
        selectedOrders: [],
        product: ''
    },
    directives: {
        money: VMoney
    }
});
