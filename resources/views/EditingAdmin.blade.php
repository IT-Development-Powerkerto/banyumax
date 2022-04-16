<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Edit</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="icon" href="../img/favicon.png">
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
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0 mt-n3">Edit Admin</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">

									<form action="{{ route('superadmin.update',['superadmin' => $admin->id]) }}" method="POST">
										@csrf
										@method('PATCH')
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputname" class="col-form-label">Admin Name</label>
											</div>
											<div class="col-10">
												<input type="text" name="name" required value="{{old('name') ?? $admin->name}}" id="inputname" class="form-control" aria-describedby="nameHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputemail" class="col-form-label">Email</label>
											</div>
											<div class="col-10">
												<input type="text" name="email" required value="{{old('email') ?? $admin->email}}" id="inputemail" class="form-control" aria-describedby="emailHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputusername" class="col-form-label">Username</label>
											</div>
											<div class="col-10">
												<input type="text" name="username" required value="{{old('username') ?? $admin->username}}" id="inputusername" class="form-control" aria-describedby="usernameHelpInline">
											</div>
										</div>
                                        <div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputRole" class="col-form-label">Packet</label>
											</div>
											<div class="dropdown col-10">
                                                <select name="paket_id" id="paket_id" class="form-control">
                                                    <option disable selected value="{{ $admin->paket_id }}" hidden>{{$admin->paket->name}}</option>
                                                    @foreach ($paket as $paket)
                                                    <option value="{{$paket->id}}" required>{{$paket->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
										</div>
										{{ csrf_field() }}
										<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Edit Admin">
									</form>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
						</div>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Page-->
			</div>
			@include('layout/_footer')
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../assets/plugins/global/plugins.bundle.js"></script>
		<script src="../assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->

        <script>
            $(document).ready(function() {
                $('#event_id').on('change', function() {
                    var eventId = $(this).val();
                    if(eventId) {
                        $.ajax({
                            url: '/getEvent/'+eventId,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                        });
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#product_id').on('change', function() {
                    var productId = $(this).val();
                    if(productId) {
                        $.ajax({
                            url: '/getProduct/'+productId,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                        });
                    }
                });
            });
        </script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
