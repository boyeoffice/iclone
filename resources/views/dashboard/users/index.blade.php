@extends('layouts.master')
@section('title')
Manage Users
@endsection
@section('content')
<section class="content-wrapper">
	<section class="content-header">
	      <h1>
	        User
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">User panel</li>
	      </ol>
	    </section>
    <section class="content">
    	<div class="box box-danger">
    		<div class="box-header with-border">
    			Users
    		</div>
    		<div class="box-body">
    			<table class="table table-condensed">
    				<thead>
    					<th v-for="th in theads">@{{th.label}}</th>
    				</thead>
    				<tbody>
    					<tr  v-for="user in users" :user="user">
    						<td>@{{user.id}}</td>
    						<td>@{{user.name}}</td>
    						<td>@{{user.email}}</td>
    						<td v-if="user.status == 0">Pending</td>
    						<td v-if="user.status == 1">Active</td>
    						<td>@{{user.created_at}}</td>
    						<td>
    						   <a href="#" class="btn btn-info btn-sm">View</a>
    							<a :href="'users/' + user.id + '/edit'" class="btn btn-primary btn-sm">Edit</a>
    							<a href="#" class="btn btn-danger btn-sm">Delete</a>
    						</td>
    					</tr>
    				</tbody>
    			</table>
    		</div>
    	</div>
    </section>
 </section>
@endsection
@section('scripts')
<script type="text/javascript">
	var app = new Vue({
	el: '#app',
	data() {
		return{
			theads: [
			{label: 'ID'},{label: 'Name'},{label: 'Email'},{label: 'Status'},{label: 'Date Created'},{label: 'Action'}
			],
			users: {!! $users !!} 
		}
	}
})
</script>
@endsection