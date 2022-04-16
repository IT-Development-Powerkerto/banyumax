<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Employees Payrol</title>

		<link rel="icon" href="img/favicon.png">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->

		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->

		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<!--begin::Container-->
						<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
							<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
								<!--begin::Page title-->
								@include('layout/header/_base')


								@include('layout/_toolbar')
							</div>
							<!--end::Wrapper-->
							<!--begin::User-->
							<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
								<!--begin::Menu wrapper-->
								<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									{{--  Image pict header  --}}
									@if(is_null(Auth()->user()->image))
									<img src="/assets/img/default.jpg" alt="" />
									@else
									<img src="{{ url('') }}/{{ Auth()->user()->image }}" alt="image" />
									@endif
								</div>

								@include('layout/topbar/partials/_user-menu')

								<!--end::Menu wrapper-->
							</div>
							<!--end::User -->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<form class="form">
                    <div class="card-body">
                        <div class="form-group row">
                        <div class="col-lg-4">
                        <label>Full Name:</label>
                        <input type="email" class="form-control" placeholder="Enter full name"/>
                        <span class="form-text text-muted">Please enter your full name</span>
                        </div>
                        <div class="col-lg-4">
                        <label>Email:</label>
                        <input type="email" class="form-control" placeholder="Enter email"/>
                        <span class="form-text text-muted">Please enter your email</span>
                        </div>
                        <div class="col-lg-4">
                        <label>Username:</label>
                        <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                        <input type="text" class="form-control" placeholder=""/>
                        </div>
                        <span class="form-text text-muted">Please enter your username</span>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-4">
                        <label>Contact:</label>
                        <input type="email" class="form-control" placeholder="Enter contact number"/>
                        <span class="form-text text-muted">Please enter your contact</span>
                        </div>
                        <div class="col-lg-4">
                        <label>Fax:</label>
                        <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-info-circle"></i></span></div>
                        <input type="text" class="form-control" placeholder="Fax number"/>
                        </div>
                        <span class="form-text text-muted">Please enter fax</span>
                        </div>
                        <div class="col-lg-4">
                        <label>Address:</label>
                        <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your address"/>
                        <div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
                        </div>
                        <span class="form-text text-muted">Please enter your address</span>
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-lg-4">
                        <label>Postcode:</label>
                        <div class="input-group">
                        <div class="input-group-append"><span class="input-group-text"><i class="la la-bookmark-o"></i></span></div>
                        <input type="text" class="form-control" placeholder="Enter your postcode"/>
                        </div>
                        <span class="form-text text-muted">Please enter your postcode</span>
                        </div>
                        <div class="col-lg-4">
                        <label>User Group:</label>
                        <div class="radio-inline">
                        <label class="radio radio-solid">
                            <input type="radio" name="example_2" checked="checked" value="2"/>
                            <span></span>
                            Sales Person
                        </label>
                        <label class="radio radio-solid">
                            <input type="radio" name="example_2" value="2"/>
                            <span></span>
                            Customer
                        </label>
                        </div>
                        <span class="form-text text-muted">Please select user group</span>
                        </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                        <button type="reset" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                        </div>
                    </div>
                    </form>
					<!--end::Page-->
					@include('layout/_footer')
		</div>
		<!--end::Root-->
		<!--end::Main-->

		<script>
			var hostUrl = "assets/";
		</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/apps/customers/list/export.js"></script>
		<script src="assets/js/custom/apps/customers/list/list.js"></script>
		<script src="assets/js/custom/apps/customers/add.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/modals/create-app.js"></script>
		<script src="assets/js/custom/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/intro.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
