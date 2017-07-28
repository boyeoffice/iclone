<template>
	<div class="wrapper">
	<navbar></navbar>
	<sidebar></sidebar>
	<div class="content-wrapper">
		<router-view></router-view>
	</div>
	</div>
</template>

<script>
import Navbar from './views/Navbar.vue'
import Sidebar from './views/Sidebar.vue'
	export default {
		components: { Navbar,Sidebar }
	}
</script>