require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import BootstrapVue from 'bootstrap-vue'

Vue.use(VueRouter)
Vue.use(BootstrapVue)
import App from './views/App'
import Dashboard from './views/Dashboard'
import Penjualan from './views/transaksi/Penjualan'
import Pembelian from './views/transaksi/Pembelian'
import Hutang from './views/arsip/Hutang'
import ListHutang from './views/arsip/hutang/ListHutang'
import PelunasanHutang from './views/arsip/hutang/PelunasanHutang'
import Piutang from './views/arsip/Piutang'
import MasterBarang from './views/master/Barang'

const router = new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: '/',
            redirect: '/dashboard'
        },
        {
            path: '/dashboard',
            component: Dashboard
        },
        {
            path: '/penjualan',
            component: Penjualan
        },
        {
            path: '/pembelian',
            component: Pembelian
        },
        {
            path: '/hutang',
            component: Hutang
        },
        {
            path: '/daftar-hutang',
            component: ListHutang
        },
        {
            path: '/pelunasan-hutang',
            component: PelunasanHutang
        },
        {
            path: '/piutang',
            component: Piutang
        },
        {
            path: '/master-barang',
            component: MasterBarang
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});