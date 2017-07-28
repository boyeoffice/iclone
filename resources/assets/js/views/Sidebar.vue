<template>
	<aside class="main-sidebar">
  <!-- Inner sidebar -->
  <div class="sidebar">
    <!-- user panel (Optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img :src="url + '/avatar/' + user.avatar" class="img-circle" alt="user.username">
      </div>
      <div class="pull-left info">
        <p>{{user.username}}</p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div><!-- /.user-panel -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Man Navigation</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><router-link to="/dashboard"><i class="fa fa-dashboard"></i>  <span>Dashboard</span></router-link>></li>
      <li><a href="#"><span>Another Link</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-users"></i>  <span>Users</span> 
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
        <ul class="treeview-menu">
          <li><router-link to="dashboard/users"><i class="fa fa-circle-o"></i>  All Users</router-link>></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Pending User</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Suspended User</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Blocked User</a></li>
        </ul>
      </li>
    </ul><!-- /.sidebar-menu -->

  </div><!-- /.sidebar -->
	</aside><!-- /.main-sidebar -->
</template>
<script>
	export default {
		data(){
			return{
				user: {},
				url: window.Url
			}
		},
		mounted() {
            this.user = window.User
        },
		computed: {
			
		}
	}
</script>