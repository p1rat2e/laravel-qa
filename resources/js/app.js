require('./bootstrap');
require('./fontawesome');

window.Vue = require('vue')
import Vue from 'vue'
import VueIzitoast from 'vue-izitoast';
import axios from 'axios';
import 'izitoast/dist/css/iziToast.min.css';
import Authorization from './authorization/authorize';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('user-info', require('./components/UserInfo.vue').default);
Vue.component('vote-c', require('./components/Vote.vue').default);
Vue.component('answers', require('./components/Answers.vue').default);
Vue.component('question', require('./components/Question.vue').default);

Vue.use(VueIzitoast)
Vue.use(Authorization)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

let app = new Vue({
    el: '#app',
});

