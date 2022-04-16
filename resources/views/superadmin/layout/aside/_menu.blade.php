<!--begin::Aside Menu-->
<div class="hover-scroll-overlay-y my-2 my-lg-5 pe-lg-n1" id="kt_aside_menu_wrapper" data-kt-scroll="true"
	data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
	data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
	<!--begin::Menu-->
	<div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold"
		id="#kt_aside_menu" data-kt-menu="true">
		<div class="menu-item py-2">
			<a class="menu-link menu-center" href="{{ route ('superadmin.index') }}" data-bs-trigger="hover" data-bs-dismiss="click"
				data-bs-placement="right">
				<span class="menu-icon me-0">
					<i class="bi bi-house fs-2"></i>
				</span>
				<span class="menu-title">Dashboard</span>
			</a>
		</div>
		<div class="menu-item py-2">
			<a class="menu-link menu-center" href="{{ route ('flip') }}" data-bs-trigger="hover" data-bs-dismiss="click"
				data-bs-placement="right">
				<span class="menu-icon me-0">
					<i class="la la-money-bill"></i>
				</span>
				<span class="menu-title">Flip</span>
			</a>
		</div>
	</div>
	<!--end::Menu-->
</div>
<!--end::Aside Menu-->