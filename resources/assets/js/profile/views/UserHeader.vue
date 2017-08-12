<template>
<div>
<div class="umbotron static-header-profile jumbotron-cover" :style="'{background: "url(url + '/' + user.cover )"}'"></div>
</div>
</template>

<script>
	export default{
		props: ['user'],
		data(){
			return{
				url: window.Url
			}
		}
	}
</script>
</template>