require('./bootstrap');
window.Vue = require('vue');

import Raphael from 'raphael/raphael'
global.Raphael = Raphael
Vue.config.productionTip = false

Vue.component('donut-component', require('./components/DonutComponent.vue').default);
Vue.component('barra-component', require('./components/BarraComponent.vue').default);

const app = new Vue({
    el: '#app'
});
