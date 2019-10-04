import './BasePage2.js';
import '../styles/contentpage.scss';// include the css for this page

console.log('-----------------loaded contentpage bundle--------------');
import Vue from 'vue';
var vueApp = new Vue({
    el: '#vueapp'
});