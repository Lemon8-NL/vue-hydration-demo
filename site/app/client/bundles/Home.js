import './Main.js';
import '../styles/homepage.scss';// include the css for this page
import PortalVue from 'portal-vue';
Vue.use(PortalVue);

import Vue from 'vue';
var vueApp = new Vue({
    el: '#vueapp'
});
console.log('-----------------loaded homepage bundle--------------');