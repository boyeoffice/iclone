require('./../bootstrap.js')
import Vue from 'vue'
import User from './User.vue'
import Router from './routes.js'

var app = new Vue({
	el: '#app',
	render: h => h(User),
	router: Router
})