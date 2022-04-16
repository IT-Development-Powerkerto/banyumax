<!--begin::Header-->
<div id="kt_header" style="background-color: rgba(0, 80, 157, 1)" class="header align-items-stretch">
	<!--begin::Container-->
	<div class="container-fluid d-flex align-items-stretch justify-content-between">

		<!--begin::Mobile logo-->
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
			<a href="?page=index" class="d-lg-none">
				<img alt="Logo" src="../img/logo.png" class="h-30px" />
			</a>
		</div>
		<!--end::Mobile logo-->
		<!--begin::Wrapper-->
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
			<!--begin::Navbar-->
			<div class="d-flex align-items-stretch" id="kt_header_nav">

				@include('layout/header/_menu')

			</div>
			<!--end::Navbar-->
			<!--begin::Topbar-->
			<div class="d-flex align-items-stretch flex-shrink-0">

				@include('layout/topbar/_base')

			</div>
			<!--end::Topbar-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->
