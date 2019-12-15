require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Dashboard from './views/Dashboard'
import Penjualan from './views/transaksi/Penjualan'
import Pembelian from './views/transaksi/Pembelian'
import Hutang from './views/arsip/Hutang'
import ListHutang from './views/arsip/hutang/ListHutang'
import PelunasanHutang from './views/arsip/hutang/PelunasanHutang'
import Piutang from './views/arsip/Piutang'

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
        {
            path: '/hutang',
            // name: 'home',
            component: Hutang
        },
        {
            path: '/daftar-hutang',
            // name: 'home',
            component: ListHutang
        },
        {
            path: '/pelunasan-hutang',
            // name: 'home',
            component: PelunasanHutang
        },
        {
            path: '/piutang',
            // name: 'home',
            component: Piutang
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});