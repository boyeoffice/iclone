@extends('layouts.master')
@section('title')
Roles
@endsection
@section('content')
<section class="content-wrapper">
	<section class="content-header">
	      <h1>
	        Manage Roles
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Roles panel</li>
	      </ol>
	    </section>
	    <section class="content">
	    	<div class="row">
	    		<div class="col-md-4" v-for="role in roles">
	    			<div class="box box-danger">
	    				<div class="box-header with-border">
	    					@{{role.display_name}}
	    					<div class="box-tool pull-right">
	    						<a :href="'roles/' + role.id + '/edit'" class="btn btn-primary btn-sm">Edit</a>
	    					</div>
	    				</div>
	    				<div class="box-body">
	    					@{{role.description}}
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </section>
</section>
@endsection

@section('scripts')
<script type="text/javascript">
	var app = new Vue({
		el: '#app',
		data: {
			roles: {!! $roles !!}
		}
	})
</script>
@endsection