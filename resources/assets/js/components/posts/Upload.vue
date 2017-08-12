<template>
	<div class="col-xs-4 col-lg-offset-4">
		<div class="panel panel-default">
		<div class="upload">
			<input type="file" class="input-file" v-on:change="onFileChange">
			<p><i class="glyphicon glyphicon-camera"></i> </p>
		</div>
		</div>
		<div v-if="conUpload" class="thumbnail col-thumb">
			<div class="position-relative btn-block">
			<img :src="form.image" height="200" class="img img-responsive">
			</div>
			<div class="caption form-group" style="margin-top: 10px;">
			<input type="text"  v-model="form.content" class="form-control">
			</div>
			<div class="caption form-group">
			<button v-if="upButton" @click="Upload" class="btn btn-primary">Upload</button>
			<button v-if="!upButton" @click="Upload" class="btn btn-primary"><i class="fa fa-circle-o-notch fa-spin"></i></button>
			</div>
	 </div><!-- end upload -->
     <post-viewer v-for="post in posts" @new-post="fetchPost" :post="post" :key="posts"></post-viewer>
	</div><!-- end col-xs-4 -->
</template>

<script>
import PostViewer from './PostViewer.vue'
	export default {
		components: { PostViewer },
		data(){
			return{
				upButton:true,
				posts: [],
				conUpload: false,
				form: {image: '', content: '' },
				url: window.Url
			}
		},
		mounted(){
			this.fetchPost()
		},
		methods: {
			     onFileChange(e){
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.createImage(files[0]);
          },
          createImage(file){
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
              vm.form.image = e.target.result;
            };
            reader.readAsDataURL(file);
            this.conUpload = true
          },
        Upload(){
        	var vm = this
        	this.upButton = false
            axios.post('/post', this.form).then(response => {
            	this.fetchPost()
            	this.uploadf()
            })
          },
          fetchPost(){
          	axios.get('/post').then(response => {
          		this.posts = response.data
          	})
          },
          uploadf(){
          	this.from = {image: '', content: ''},
          	this.conUpload = false
          	this.upButton = true
          }
		}
	}
</script>

<style lang="scss">
.upload {
	color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
	padding: 3px 0px 2px;
	min-height: 20px;
	position: relative;
	cursor: pointer;
}
.input-file {
	opacity: 0;
	width: 100%;
	height: 38px;
	position: absolute;
	cursor: pointer;
}
.upload:hover {
	color: #fff;
   background-color: #286090;
   border-color: #122b40;
}
.upload p {
	font-size: 2em;
	text-align: center;
	margin-top: 1px;
}
</style>