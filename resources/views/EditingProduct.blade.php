<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Edit Product</title>
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
										<h3 class="fw-bolder m-0 mt-n3">Edit Product</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">

                                    <form action="{{ route('product.update',['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputFullname" class="col-form-label">Name</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" name="name" id="inputFullname" value="{{ old('name') ?? $product->name }}" class="form-control" aria-describedby="fullnameHelpInline">
                                            </div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputprice" class="col-form-label">Price</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="price" name="price" id="inputprice" value="{{ old('price') ?? $product->price }}" class="form-control" aria-describedby="priceHelpInline">
                                            </div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputdiscount" class="col-form-label">Discount</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" name="discount" id="inputdiscount" value="{{ old('discount') ?? $product->discount }}" class="form-control" aria-describedby="discountHelpInline">
                                            </div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputimage" class="col-form-label">Image</label>
                                            </div>
                                            <div class="dropdown col-10">
                                                <div class="mb-3">
                                                    <input class="form-control" value="{{ old('image') ?? $product->image }}" type="file" id="inputimage" name="image" id="formFileMultiple" multiple id>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputproduct_link6" class="col-form-label">Product Link</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="product_link" name="product_link" id="inputproduct_link6" value="{{ old('product_link') ?? $product->product_link }}" class="form-control" aria-describedby="passwordHelpInline">
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Edit Product">
                                    </form>

								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
						</div>
					</div>
					<!--end::Wrapper-->
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
	</body>
	<!--end::Body-->
</html>
