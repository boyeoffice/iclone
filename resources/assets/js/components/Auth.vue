<template>
	<section>
	<div class="login-box" v-if="!regPage">
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

<div class="register-box" v-if="regPage">
	<div class="register-logo">Clone</div>
	<div class="register-body">
		<p class="register-box-msg">Register a new membership</p>
		<form @submit.prevent="Register">
           <div class="form-group has-feedback">
				<input type="text" placeholder="Username" v-model="reg.username" class="form-control">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
				<span v-if="error.username" class="help-block">
                  <strong>{{ error.username[0]}}</strong>
                 </span>
			</div>
          <div class="form-group has-feedback">
				<input type="text" placeholder="Full Name" v-model="reg.name" class="form-control">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
				<span v-if="error.name" class="help-block">
                  <strong>{{ error.name[0]}}</strong>
                 </span>
			</div>
		<div class="form-group has-feedback">
				<input type="email" placeholder="Email" v-model="reg.email" class="form-control">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				<span v-if="error.email" class="help-block">
                  <strong>{{ error.email[0]}}</strong>
                 </span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" placeholder="Password" v-model="reg.password" class="form-control">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<span v-if="error.password" class="help-block">
                  <strong>{{ error.password[0]}}</strong>
                 </span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" placeholder="Retype Password" v-model="reg.password_confirmation" class="form-control">
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				<span v-if="error.password_confirmation" class="help-block">
                  <strong>{{ error.password_confirmation[0]}}</strong>
                 </span>
			</div>
			<div class="row">
			    <div class="col-xs-8">
			    <div class="checkbox"><label><input type="checkbox"> I agree to the <a href="#"> terms</a></label></div></div>
				<div class="col-xs-4">
				<button class="btn btn-primary btn-flat" v-if="isProcessing">Please wait...</button>
				<button class="btn btn-primary btn-flat" v-if="!isProcessing">Register</button>
			    </div>
			</div>
		</form>
				<div class="social-auth-links text-center">
		      <p>- OR -</p>
		      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
		        Facebook</a>
		      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
		        Google+</a>
		        <a href="#" class="btn btn-block btn-clone btn-flat" @click="cLogin">Login</a>
		    </div>
	</div>
</div><!-- end of register-box -->
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
				isProcessing: false,
				regPage: true,
				reg:{username: '',name: '',email: '',password: '',password_confirmation: ''}
			}
		},
		methods: {
			cLogin(){
				this.regPage = false
			},
			cRegister(){
                this.regPage = true
			},
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
			},
			Register(){
				this.isProcessing = true
                 axios[this.method]('/auth/register', this.reg).then(res => {
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