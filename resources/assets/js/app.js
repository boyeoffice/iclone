require('./bootstrap');
import Vue from 'vue'
Vue.component('upload', require('./components/posts/Upload.vue'))

const app = new Vue({
    el: '#app'
});



