require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Dashboard from './views/Dashboard'
import Penjualan from './views/kasir/Penjualan'
import Pembelian from './views/kasir/Pembelian'

const router = new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: '/',
            // name: 'home',
            redirect: '/dashboard'
        },
        {
            path: '/dashboard',
            // name: 'home',
            component: Dashboard
        },
        {
            path: '/penjualan',
            // name: 'home',
            component: Penjualan
        },
        {
            path: '/pembelian',
            // name: 'home',
            component: Pembelian
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});