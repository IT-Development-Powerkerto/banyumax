<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Daily Checkin</title>
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
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Tables Widget 9-->
							<div class="card card-xl-stretch mb-5 mb-xl-8">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label fw-bolder fs-3 mb-1 mt-n3">Daily Check-in</span>
										<span class="text-muted mt-1 fw-bold fs-7">{{ count($user) }}</span>
									</h3>
									<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1 me-2">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-6">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
													<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" style="height: 33px;" placeholder="Search Staff" />
										</div>
										<!--end::Search-->
										<a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-3">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Add Staff</a>
									</div>
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body py-3">
									<!--begin::Table container-->
									<div class="table-responsive">
										<!--begin::Table-->
										<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="kt_customers_table">
											<!--begin::Table head-->
											<thead>
												<tr class="fw-bolder text-muted">
													<th class="min-w-50px">No</th>
													<th class="min-w-100px">Name</th>
													<th class="min-w-200px">Description</th>
													<th class="min-w-50px max-w-100px text-center">Work</th>
													<th class="min-w-50px max-w-100px text-center">Absence</th>
													<th class="min-w-50px max-w-100px text-center">WFH</th>
													<th class="min-w-50px max-w-100px text-center">LP</th>
													<th class="min-w-50px max-w-100px text-center">LW</th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
												<?php $n=0 ?>
												@foreach ($user as $user)
													<tr>
														<td>
															<label class="text-dark fw-medium-block fs-6">{{ $n+=1 }}</label>
														</td>
														<td>
															<div class="d-flex align-items-center">
																<div class="symbol symbol-45px me-5 image-size">
																	@if(is_null($user->image))
																	<img src="/assets/img/default.jpg" width="100px" alt="" />
																	@else

																	<img src="{{$user->image}}" width="100px" alt="" />
																	@endif
																</div>
																<div class="d-flex justify-content-start flex-column">
																	<a href="{{ route('users.edit',['user' => $user->id]) }}" class="text-dark fw-medium text-hover-primary fs-6">{{$user->name}}</a>
																</div>
															</div>
														</td>
														<td>
															<textarea class="text-dark form-control form-control-solid fw-medium-block fs-6"></textarea>
														</td>
														<td>
															<div class="d-flex justify-content-center" style="width: 100px">
																<!--begin::Radio-->
																<span class="form-check form-check-custom form-check-white form-check-sm align-items-start">
																	<input class="form-check-input form-check-success" type="radio" name="status{{ $user->id }}" value="Work">
																</span>
																<!--end::Radio-->
															</div>
														</td>
														<td>
															<div class="d-flex justify-content-center" style="width: 100px">
																<!--begin::Radio-->
																<span class="form-check form-check-custom form-check-white form-check-sm align-items-start">
																	<input class="form-check-input form-check-success" type="radio" name="status{{ $user->id }}" value="absence">
																</span>
																<!--end::Radio-->
															</div>
														</td>
														<td>
															<div class="d-flex justify-content-center" style="width: 100px">
																<!--begin::Radio-->
																<span class="form-check form-check-custom form-check-white form-check-sm align-items-start">
																	<input class="form-check-input form-check-success" type="radio" name="status{{ $user->id }}" value="WFH">
																</span>
																<!--end::Radio-->
															</div>
														</td>
														<td>
															<div class="d-flex justify-content-center" style="width: 100px">
																<!--begin::Radio-->
																<span class="form-check form-check-custom form-check-white form-check-sm align-items-start">
																	<input class="form-check-input form-check-success" type="radio" name="status{{ $user->id }}" value="LP">
																</span>
																<!--end::Radio-->
															</div>
														</td>
														<td>
															<div class="d-flex justify-content-center" style="width: 100px">
																<!--begin::Radio-->
																<span class="form-check form-check-custom form-check-white form-check-sm align-items-start">
																	<input class="form-check-input form-check-success" type="radio" name="status{{ $user->id }}" value="LW">
																</span>
																<!--end::Radio-->
															</div>
														</td>
													</tr>
												@endforeach
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table container-->
								</div>
								<!--begin::Body-->
							</div>
							<!--end::Tables Widget 9-->
						</div>
						<!--end::Wrapper-->
					</div>
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
		<script src="assets/js/custom/apps/customers/list/warehouse.js"></script>
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
