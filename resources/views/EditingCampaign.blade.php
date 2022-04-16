<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Edit Campaign</title>
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
						<!--begin::Container-->
						@include('layout/header/_base')
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
										<h3 class="fw-bolder m-0 mt-n3">Edit Campaign</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">

									<form action="{{ route('campaign.update',['campaign' => $campaign->id]) }}" method="POST">
										@csrf
										@method('PATCH')
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputtitle" class="col-form-label">Tittle</label>
											</div>
											<div class="col-10">
												<input type="text" name="title" required value="{{ old('title') ?? $campaign->title }}" id="inputtitle" class="form-control" aria-describedby="titleHelpInline">
											</div>
										</div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputRole" class="col-form-label">Product</label>
                                            </div>
                                            <div class="dropdown col-10">
                                                <select name="product_id" id="product_id" class="form-control">
                                                    <option disable selected value="{{ $campaign->product_id }}" hidden>{{$campaign->product->name}}</option>
                                                    @foreach ($products as $product)
                                                    <option value="{{$product->id}}" required>{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputfbp" class="col-form-label">Facebook Pixel</label>
											</div>
											<div class="col-10">
												<textarea type="text" name="fbp" required id="inputfbp" class="form-control" aria-describedby="fbpHelpInline">{{ old('facebook_pixel') ?? $campaign->facebook_pixel }}</textarea>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputRole" class="col-form-label">Facebook Event Form</label>
											</div>
											<div class="dropdown col-10">
												<select name="event_id" id="event_id" class="form-control">
													<option disable selected value="{{ $campaign->event_pixel_id }}" hidden>{{$campaign->event_pixel->name}}</option>
													@foreach ($event as $event)
													<option value="{{ $event->id }}">{{$event->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputtp" class="col-form-label">Thanks Page</label>
											</div>
											<div class="col-10">
												<textarea type="text" required name="tp" id="inputtp" class="form-control" aria-describedby="tpHelpInline">{{ old('message') ?? $campaign->message }}</textarea>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="wa_event_id" class="col-form-label">Facebook Event WA</label>
											</div>
											<div class="dropdown col-10">
												<select name="event_wa" id="wa_event_id" class="form-control">
													<option disable selected value="{{ $campaign->event_wa_id }}" hidden>{{$campaign->event_wa->name}}</option>
													@foreach ($eventWa as $event)
													<option value="{{ $event->id }}">{{$event->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputat"  class="col-form-label">Customer to CS</label>
											</div>
											<div class="col-10">
												<textarea type="text" name="customer_to_cs" value="{{ old('customer_to_cs') ?? $campaign->customer_to_cs }}" required id="inputat" class="form-control" aria-describedby="atHelpInline">{{ $campaign->customer_to_cs }}</textarea>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputat"  class="col-form-label">CS to Customer</label>
											</div>
											<div class="col-10">
												<textarea type="text" name="cs_to_customer" value="{{ old('cs_to_customer') ?? $campaign->cs_to_customer }}" required id="inputat" class="form-control" aria-describedby="atHelpInline">{{ $campaign->cs_to_customer }}</textarea>
											</div>
										</div>
										{{ csrf_field() }}
										<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Edit Campaign">
									</form>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Page-->
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
