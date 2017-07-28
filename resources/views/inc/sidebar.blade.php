<aside class="main-sidebar">
	<section class="sidebar" style="height: auto;">
		<div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('avatar/'. Auth::user()->avatar)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- end user-panel -->
      <ul class="sidebar-menu">
      	<li class="header">MAIN NAVIGATION</li>
      	<li class="treeview @if(Request::url('dashboard')) active @endif">
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
        	<a href="#"><i class="fa fa-users"></i> <span>Manage User</span>
        	<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        	 </a>
        	 <ul class="treeview-menu">
            <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> All Users</a></li>
             <li><a href="#"><i class="fa fa-circle-o"></i> All Administrators</a></li>
             <li><a href="#"><i class="fa fa-circle-o"></i> Reported Users</a></li>
            </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Permission &amp; Roles</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
           </a>
           <ul class="treeview-menu">
            <li><a href="{{route('permissions.index')}}"><i class="fa fa-circle-o"></i> Permission</a></li>
             <li><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
            </ul>
        </li>
      </ul>
	</section>
</aside>