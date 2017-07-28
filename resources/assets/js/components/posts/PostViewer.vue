<template>
	 <div class="thumbnail col-thumb">
	 <div class="caption">
	 	<p class="author p-author">
	 		<a href="#" class="label label-primary btn-team-xs pull-right"><i class="glyphicon glyphicon-menu-down"></i></a>
	 		<a :href="url + '/user/' + post.user.username" class="myicon-right">
    			<img :src="url + '/avatar/' + post.user.avatar" class="img-circle img-avatar-shots" height="20" width="20">
    		</a>
    		<a :href="url + '/user/' + post.user.username" class="myicon-right text-decoration-none" title=""> {{post.user.username}} </a>
	 	</p>
	 </div>
	 <a class="position-relative btn-block" href="#">
    	<img title="Beach house" :src="url + post.image" min-height="200" class="image-url img-responsive btn-block"></a>
	 	<div class="caption"><span class="title-shots">{{post.content}}</span></div>
           
	 </div>
</template>
<script>
	export default {
		props: ['post'],
		data(){
			return{
				url: window.Url
			}
		}
	}
</script>