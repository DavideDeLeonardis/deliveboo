require('./bootstrap');

window.Vue = require('vue');

import store from './store';

import App from './views/App';
import Home from "./pages/Home";
import Restaurant from "./pages/Restaurant";
import Payment from "./components/Payment";
import Checkout from "./components/Checkout";


import VueRouter from "vue-router";
import VueBraintree from 'vue-braintree'
import Vuex from 'vuex'
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VueBraintree);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/restaurants/:slug",
            name: "restaurant",
            props: true,
            component: Restaurant,
        },
        {
            path: "/payment",
            name: "payment",
            component: Payment,
        },
        {
            path: "/checkout",
            name: "checkout",
            component: Checkout,
        },
    ],
});

import { library } from "@fortawesome/fontawesome-svg-core";
import { faSpinner, faVolumeXmark } from "@fortawesome/free-solid-svg-icons";
library.add(faSpinner);

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Vue from 'vue';
Vue.component('font-awesome-icon', FontAwesomeIcon);

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store: new Vuex.Store(store)
});
