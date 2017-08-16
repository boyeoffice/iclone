<template>
	<section>
	<div class="login-box">
	<div class="login-logo">Clone</div>
	<div class="login-body">
		<p class="login-box-msg">Login to start your session</p>
		<form @submit.prevent="Sign">
		<span v-if="error.message" class="help-block">
                  <strong>{{ error.message[0]}}</strong>
                 </span>
		<div class="form-group has-feedback">
				<input type="email" placeholder="Email" v-model="form.email" class="form-control">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<span v-if="error.email" class="help-block">
                  <strong>{{ error.email[0]}}</strong>
                 </span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" placeholder="Password" v-model="form.password" class="form-control">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<span v-if="error.password" class="help-block">
                  <strong>{{ error.password[0]}}</strong>
                 </span>
			</div>
			<div class="row">
				<div class="col-xs-4">
				<button class="btn btn-primary btn-flat" v-if="isProcessing">Please wait...</button>
				<button class="btn btn-primary btn-flat" v-if="!isProcessing">Sign In</button>
			    </div>
			</div>
		</form>
		<div class="social-auth-links text-center">
		 <p>- OR -</p>
		<a href="#" class="btn btn-block btn-clone btn-flat" @click="cRegister">Register</a>
		</div>
	</div>
</div><!-- end of login-box -->
</section>
</template>

<script>
	export default{
		data(){
			return{
				url: window.Url,
				method: 'post',
				form: {email: '',password: ''},
				error: {},
				isProcessing: false
			}
		},
		methods: {
			Sign(){
				this.isProcessing = true
				axios[this.method]('/auth/login', this.form).then(res => {
                  if(res.data.success){
                  	window.location.href = '/'
                  }
				}).catch(err => {
					if(err.response.status === 422){
						this.error = err.response.data
					}
					this.isProcessing = false
				})
			}
		}
	}
</script>