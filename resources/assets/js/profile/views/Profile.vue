<template>
	<div>
		<user-header :user="user"></user-header>
	</div>
</template>
<script>
import UserHeader from './UserHeader.vue'
	export default{
		components: {UserHeader},
		data(){
			return{
				user: []
			}
		},
		mounted(){
			axios.get('/timeline/' + this.$route.params.username).then(response => {
				this.user = response.data
			})
		}
	}
</script>