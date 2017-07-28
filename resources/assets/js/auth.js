require('./bootstrap.js')
import Vue from 'vue'


Vue.component('auth', require('./components/Auth.vue'))

var app = new Vue({
	el:'#app'
})