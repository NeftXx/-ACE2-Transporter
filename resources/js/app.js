require('./bootstrap');
window.Vue = require('vue');

import Raphael from 'raphael/raphael'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)
global.Raphael = Raphael
Vue.config.productionTip = false
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.component('donut-component', require('./components/DonutComponent.vue').default);
Vue.component('barra-component', require('./components/BarraComponent.vue').default);
Vue.component('line-component', require('./components/LineComponent.vue').default);
Vue.component('navbar-component', require('./components/NavBarComponent.vue').default);
Vue.component('card-component', require('./components/CardComponent.vue').default);
Vue.component('dash-board-component', require('./components/DashBoardComponent.vue').default);
Vue.component('recorridos-component', require('./components/TablaRecorridosComponent.vue').default);

const app = new Vue({
    el: '#app'
});
