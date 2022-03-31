require('./bootstrap');

window.Vue = require('vue');

import App from './views/App';
import Home from "./pages/Home";
import Restaurant from "./pages/Restaurant";

import { library } from "@fortawesome/fontawesome-svg-core";
import { faSpinner } from "@fortawesome/free-solid-svg-icons";
library.add(faSpinner);

import VueRouter from "vue-router";
Vue.use(VueRouter);

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
Vue.component('font-awesome-icon', FontAwesomeIcon);

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
    ],
});

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
