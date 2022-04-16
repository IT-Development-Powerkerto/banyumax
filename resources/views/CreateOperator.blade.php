<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Create Operator</title>
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
						<!--begin::Container-->
						<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
							<!--begin::Page title-->
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<!--begin::Heading-->
								<h1 class="text-dark fw-bold my-0 fs-2">Create Operator</h1>
								<!--end::Heading-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-line text-muted fw-bold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="{{ route('dashboard.index') }}" class="text-muted">Home</a>
									</li>
									<li class="breadcrumb-item text-muted">Operator</li>
									<li class="breadcrumb-item text-dark">Create Operator</li>
								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title=-->
							<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
								<!--begin::Logo-->
								    <img alt="Logo" src="../img/logo.png" class="h-40px" />
								<!--end::Logo-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Toolbar wrapper-->
							<div class="d-flex flex-shrink-0">
								<!--begin::Create app-->
								<div class="d-flex ms-3">
									<a href="{{ route('operator.index') }}" class="btn btn-primary">Back</a>
								</div>
								<!--end::Create app-->
							</div>
							<!--end::Toolbar wrapper-->
						</div>
						<!--end::Container-->
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
										<h3 class="fw-bolder m-0 mt-n3">Create Operator</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
                                    <form action="" method="POST">
                                        @csrf

                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputtitle" class="col-form-label">Name</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" name="nameop" value="" id="inputtitle" class="form-control" aria-describedby="nameopHelpInline">
                                            </div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputnickname" class="col-form-label">Nickname</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" name="nickname" value="" id="inputnickname" class="form-control" aria-describedby="fbpHelpInline">
                                            </div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputType" class="col-form-label">Type</label>
                                            </div>
                                            <div class="dropdown col-10">
                                                <select name="typeop" id="inputType" class="form-control">
                                                    <option value="">Choose Type</option>
                                                    <option value="">WhatsApp</option>
                                                    <option value="">Email</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputidentity" class="col-form-label">Identity</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" name="identity" value="" id="inputidentity" class="form-control" aria-describedby="fbpHelpInline">
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Create Operator">
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
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
