// Include the generic css (it mainly includes the header/footer css and a few generic styles)
import '../styles/basepage.scss';

// Import some generic components that we'll need everywhere
import Vue from 'vue'; //we need to import Vue here as we need to import some Vue components
import { NavbarPlugin } from 'bootstrap-vue/es/components/navbar';
import 'lazysizes';

// add these generic components as components to our Vue instance
[NavbarPlugin].forEach((x) => Vue.use(x));

// we don't instantiate a Vue instance here, since we're only supposed to have 1 Vue instance per page
console.log('-----------------loaded base bundle--------------');