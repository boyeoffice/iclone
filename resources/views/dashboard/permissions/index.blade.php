@extends('layouts.master')
@section('title')
Permissions
@endsection
@section('content')
<section class="content-wrapper">
	<section class="content-header">
	      <h1>
	        Permission
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Permission panel</li>
	      </ol>
	    </section>
    <section class="content">
    	<div class="box box-danger">
    		<div class="box-header with-border">
    			Permission
    		</div>
    		<div class="box-body">
    			<table class="table table-condensed">
    				<thead>
    					<th v-for="th in theads">@{{th.label}}</th>
    				</thead>
    				<tbody>
    					<tr  v-for="p in permissions" :user="user">
    					    <th>@{{p.display_name}}</th>
    						<td>@{{p.name}}</td>
    						<td>@{{p.description}}</td>
    						<td>
    						   <a href="#" class="btn btn-info btn-sm">View</a>
    							<a :href="'permissions/' + p.id + '/edit'" class="btn btn-primary btn-sm">Edit</a>
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
			{label: 'Name'},{label: 'Slug'},{label: 'Description'},{label: 'Action'}
			],
			permissions: {!! $permissions !!} 
		}
	}
})
</script>
@endsection