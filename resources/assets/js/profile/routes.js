import Vue from 'vue'
import Dashboard from './Dashboard.vue'
import Parent from './Parent'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
const router = new VueRouter({
	mode: 'history',
	routes:[
	{
		path: '/user/:username',
		component: Dashboard,
		children: [
		{path: '/', component: require('./views/Profile.vue')}
		]
	}
	]
})
export default router