<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Human Resource</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="icon" href="img/favicon.png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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
					<!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl mt-10">
                        <!--begin::Row-->
                        <div class="row gy-5 g-xl-10">
                            <!--begin::Col-->
                            <div class="col-xl-4 mb-xl-10">
                                <!--begin::Engage widget 3-->
                                <div class="card bg-danger h-md-100">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column pt-13 pb-14">
                                        <!--begin::Heading-->
                                        <div class="m-0">
                                            <!--begin::Title-->
                                            <h1 class="fw-bold text-white text-center lh-lg mb-9">HRIS
                                            <br />
                                            <span class="fw-boldest fs-3">Human Resource Information System</span></h1>
                                            <!--end::Title-->
                                            <!--begin::Illustration-->
                                            <div class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center card-rounded-bottom h-200px mh-200px my-5 mb-lg-12" style="background-image:url('assets/media/svg/illustrations/easy/5.svg')"></div>
                                            <!--end::Illustration-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Links-->
                                        <div class="text-center">
                                            <!--begin::Link-->
                                            <a class="btn btn-sm btn-white btn-color-gray-800 me-2" data-bs-target="#kt_modal_invite_friends" data-bs-toggle="modal">New Delivery</a>
                                            <!--end::Link-->
                                            <!--begin::Link-->
                                            <a class="btn btn-sm bg-white btn-color-white bg-opacity-20" href="../../demo1/dist/apps/invoices/view/invoice-1.html">Quick Guide</a>
                                            <!--end::Link-->
                                        </div>
                                        <!--end::Links-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Engage widget 3-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-8 mb-5 mb-xl-10">
                                <!--begin::Chart widget 11-->
                                <div class="card card-flush h-xl-100">
                                    <!--begin::Body-->
                                    <div class="card-body shadow-sm pt-4">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur libero laboriosam unde recusandae minima quae tempore magnam fugit quia iure officiis dolor, amet repellat beatae dolores! Debitis odio ducimus voluptatum.</p>
                                        <a href="" class="btn btn-primary rounded">Purchase Now</a>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Chart widget 11-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
            </div>
            @include('layout/_footer')
			<!--end::Page-->
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
        <script src="assets/js/custom/apps/customers/list/leads.js"></script>
        <script src="assets/js/custom/apps/customers/add.js"></script>
        <script src="assets/js/custom/daily-widgets.js"></script>
        <script src="assets/js/custom/apps/chat/chat.js"></script>
        <script src="assets/js/custom/modals/create-app.js"></script>
        <script src="assets/js/custom/modals/upgrade-plan.js"></script>
        <script src="assets/js/custom/intro.js"></script>
	</body>
</html>
