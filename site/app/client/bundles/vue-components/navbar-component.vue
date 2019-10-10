<template>
	<b-navbar toggleable="md" type="dark" variant="dark">
		<b-navbar-brand href="#">NavBar</b-navbar-brand>
		<b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
		<b-collapse id="nav-collapse" is-nav>
			<b-navbar-nav>
				<li class="nav-item" v-for="(link, index) in $slots.links" :key="index">
					<vnode :node="link" />
				</li>
			</b-navbar-nav>
		</b-collapse>
	</b-navbar>
</template>

<script>
	import BNavbar from 'bootstrap-vue/src/components/navbar/navbar';
	import BNavbarNav from 'bootstrap-vue/src/components/navbar/navbar-nav';
	import BNavbarBrand from 'bootstrap-vue/src/components/navbar/navbar-brand';
	import BNavbarToggle from 'bootstrap-vue/src/components/navbar/navbar-toggle';
	import BCollapse from 'bootstrap-vue/src/components/collapse/collapse';

	export default {
		name: 'navbar-component',
		components: {
			'b-navbar' : BNavbar,
			'b-navbar-nav' : BNavbarNav,
			'b-navbar-brand' : BNavbarBrand,
			'b-navbar-toggle' : BNavbarToggle,
			'b-collapse' : BCollapse,
			"vnode": {
				functional: true,
				render(h, context) {
					return context.props.node
				}
			}
		}
	}
</script>

<style lang="scss">
	@import "../../styles/includes/navbar";
</style>