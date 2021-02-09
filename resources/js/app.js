require('./bootstrap');

require('alpinejs');

import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store'

Vue.use(VueRouter)


//Main pages
import App from './Views/App.vue'
import Home from "./Views/Home";
import Products from "./components/Products"
import AddToCart from "./components/AddToCart"
import Checkout from "./components/Checkout"

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App, AddToCart, Checkout, Products },
    router,
    store
});
