require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import App from './views/App';

const app = new Vue({
    el: '#app',
    render: h => h(App),
    // router
});
