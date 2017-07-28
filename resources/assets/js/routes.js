import Vue from 'vue'
import Dashboard from './Dashboard.vue'
import Parent from './Parent'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
const router = new VueRouter({
	mode: 'history',
	routes:[
	{
		path: '/dashboard', 
		component: Dashboard,
		children: [
		    {
		    	path: '/', component: require('./views/Home.vue')
		    },
			{
			path: 'users',
			component: Parent,
			children: [
					{
						path: '/', component: require('./views/users/Index.vue')
					},
					{
						path: ':id', component: require('./views/users/Edit.vue')
					}
			]
		   }
		]
	}
	]
})
export default router


