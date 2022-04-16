<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>View Profile {{ old('name') ?? $admin->name }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<!-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
		<link href="{{ URL::asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!-- <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
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
						@include('layout/header/_base')
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Navbar-->
							<div class="card mb-5 mb-xl-10">
								<div class="card-body pt-9 pb-0">
									<!--begin::Details-->
									<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
										<!--begin: Pic-->
										<div class="me-7 mb-4">
											<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
												@if(is_null($admin->image))
												<img src="{{ url('') }}/assets/img/default.jpg" alt="" />
												@else
												<img src="{{ url('') }}/{{ $admin->image }}" alt="image" />
												@endif
												<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
											</div>
										</div>
										<!-- <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url(assets/media/users/blank.png)">
											<div class="image-input-wrapper">
												<img alt="Logo" src="{{ url('') }}/{{$admin->image}}" />
											</div>

											<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
												<i class="fa fa-pen icon-sm text-muted"></i>
												<input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg"/>
												<input type="hidden" name="profile_avatar_remove"/>
											</label>

											<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>

											<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>
										</div> -->
										<!--end::Pic-->
										<!--begin::Info-->
										<div class="flex-grow-1">
											<!--begin::Title-->
											<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
												<!--begin::User-->
												<div class="d-flex flex-column">
													<!--begin::Name-->
													<div class="d-flex align-items-center mb-2">
														<label class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ $admin->name }}
															<h3 class="badge badge-light-success " data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">{{$admin->paket->name}}</h3>
														</label>
													</div>
													<!--end::Name-->
													<!--begin::Info-->
													<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
														<label class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
														<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
														<span class="svg-icon svg-icon-4 me-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
																<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->{{ $admin->role->name}}</label>
                                                        <label href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
														<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
														<span class="svg-icon svg-icon-4 me-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
																<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->{{ $admin->email }}</label>
													</div>
													<!--end::Info-->
												</div>
												<!--end::User-->
												<div class="d-flex my-2">
													<a href="#" class="btn btn-secondary me-3 text-gray-600"><i class="las la-file-download" style="font-size: 24px"></i>Export Lead {{ $admin->name }}</a>
												</div>
											</div>
											<!--end::Title-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Details-->
									<!--begin::Navs-->
									<div class="d-flex overflow-auto h-55px">
										<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
											<!--begin::Nav item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary me-6 active" href="../dist/account/overview.html">Overview</a>
											</li>
											<!--end::Nav item-->
										</ul>
									</div>
									<!--begin::Navs-->
								</div>
							</div>
							<!--end::Navbar-->
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0" mt-n3>{{ old('name') ?? $admin->name }}</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<form action="#" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PATCH')
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputFullname" class="col-form-label">Fullname</label>
											</div>
											<div class="col-10">
												<label type="text" name="name" value="" id="inputFullname" class="form-control" aria-describedby="fullnameHelpInline">{{ old('name') ?? $admin->name }}</label>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputEmail" class="col-form-label">Email</label>
											</div>
											<div class="col-10">
												<label type="email" name="email" value="" id="inputEmail" class="form-control" aria-describedby="emailHelpInline">{{ old('email') ?? $admin->email }}</label>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputPhone" class="col-form-label">Phone</label>
											</div>
											<div class="col-10">
												<label type="text" name="phone" value="" id="inputPhone" class="form-control" aria-describedby="phoneHelpInline">{{ old('phone') ?? $admin->phone }}</label>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputUsername" class="col-form-label">Username</label>
											</div>
											<div class="col-10">
												<label type="text" name="username" value="" id="inputUsername" class="form-control" aria-describedby="usernameHelpInline">{{ old('username') ?? $admin->username }}</label>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputUsername" class="col-form-label">Proof Of Payment</label>
											</div>
											<div class="col-10">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
													Show The Proof
												</button>

												<!-- Modal -->
												<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Proof Of Payment</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
                                                            @if ($proof == null)
                                                                <img src="assets/img/default.jpg" width="450px" alt="image">
                                                            @else
                                                                <img src="{{$proof}}" width="450px" alt="image">
                                                            @endif
														</div>
														<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														</div>
													</div>
													</div>
  												</div>
											</div>
										</div>
										{{ csrf_field() }}
									</form>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">Created by</span>
								<a href="https://powerkerto.com" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">Powerkerto</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../assets/plugins/global/plugins.bundle.js"></script>
		<script src="../assets/js/scripts.bundle.js"></script>
		<script>
			var avatar1 = new KTImageInput('kt_image_1');
		</script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function() {
				$('#role_id1').on('change', function() {
					var roleId = $(this).val();
					if(roleId) {
						$.ajax({
							url: '/getRole/'+roleId,
							type: "GET",
							data : {"_token":"{{ csrf_token() }}"},
							dataType: "json",
						});
					}//else{
					//     $('#course').empty();
				// }
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$('#role_id2').on('change', function() {
					var roleId = $(this).val();
					if(roleId) {
						$.ajax({
							url: '/getRole/'+roleId,
							type: "GET",
							data : {"_token":"{{ csrf_token() }}"},
							dataType: "json",
						});
					}//else{
					//     $('#course').empty();
				// }
				});
			});
		</script>
		<!--end::Javascript-->

	</body>
	<!--end::Body-->
</html>
