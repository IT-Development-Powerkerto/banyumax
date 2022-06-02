<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Budgeting Request</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="icon" href="img/favicon.png">
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
							<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
								<!--begin::Page title-->
								@include('layout/header/_baseADV')


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
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0">Budget Realization</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<form action="{{route('budgeting_realization.store')}}" method="POST" enctype="multipart/form-data">
										@csrf
                                        <div class="row align-items-center col-12 pb-5">
                                            <div class="col-2">
                                                <label for="inputItem" class="col-form-label">Add Item</label>
                                            </div>
                                            <div class="dropdown col-10">
                                                <input type="text" name="item" id="item" class="form-control" aria-describedby="ItemHelpInline">
                                            </div>
                                        </div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputNominal" class="col-form-label">Nominal (Rp)</label>
											</div>
											<div class="col-10">
												<input type="text" name="requirement" id="requirement" class="form-control" aria-describedby="NominalHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputproof" class="col-form-label">Upload Proof</label>
											</div>
											<div class="dropdown col-10">
												<div class="mb-3">
													<input class="form-control" type="file" id="attachment" name="attachment" id="attachment" multiple id>
												</div>
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputdesc" class="col-form-label">Description</label>
											</div>
											<div class="col-10">
												<textarea type="text" name="description" id="description" class="form-control" aria-describedby="descHelpInline"></textarea>
											</div>
										</div>
										{{ csrf_field() }}
										<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Submit">
									</form>
								</div>
								<!--end::Card body-->
                                <!--begin::Tables Widget 9-->
								<div class="card card-l-stretch mb-5 mb-xl-8 mt-6">
									<!--begin::Header-->
									<div class="card-header border-0 pt-5">
										<h3 class="card-title align-items-start flex-column mt-n3">
											<span class="card-label fw-bolder fs-3 mb-1">Activity Logs</span>
                                            @if (auth()->user()->role_id == 1)
											    <span class="text-muted mt-1 fw-bold fs-7">{{$budgeting_realization->where('admin_id', auth()->user()->admin_id)->count()}} Activity</span>
                                            @else
											    <span class="text-muted mt-1 fw-bold fs-7">{{$budgeting_realization->where('admin_id', auth()->user()->admin_id)->where('user_id', auth()->user()->id)->count()}} Activity</span>
                                            @endif
										</h3>
									</div>
									<!--end::Header-->
									<!--begin::Body-->
										<div class="card-body py-3 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
										<!--begin::Table container-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="staff">
												<!--begin::Table head-->
												<thead>
													<tr class="fw-bolder text-muted">
														<th class="min-w-150px">Timestamp</th>
														<th class="min-w-150px">Item</th>
														<th class="min-w-150px">Division</th>
														<th class="min-w-150px">Nominal</th>
														<th class="min-w-150px">Description</th>
														<th class="min-w-150px text-end">Attachment</th>
													</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody>
                                                    @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 12)
                                                        @foreach ($budgeting_realization->where('admin_id', auth()->user()->admin_id)->where('role_id', 4) as $budgeting_realization)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex justify-content-start flex-column">
                                                                        <h1 href="#" class="text-dark fw-normal fs-6">{{$budgeting_realization->created_at}}</h1>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->item_name}}</h1>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->role->name}}</h1>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h1 class="text-dark fw-normal fs-6">Rp.
                                                                        <script>
                                                                            var bilangan = {{$budgeting_realization->requirement}};

                                                                            var	number_string = bilangan.toString(),
                                                                                sisa 	= number_string.length % 3,
                                                                                rupiah 	= number_string.substr(0, sisa),
                                                                                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                                            if (ribuan) {
                                                                                separator = sisa ? '.' : '';
                                                                                rupiah += separator + ribuan.join('.');
                                                                            }

                                                                            document.write(rupiah);
                                                                        </script>
                                                                    </h1>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->description}}</h1>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center justify-content-end">
                                                                    <a href="{{ route('download', $budgeting_realization->id) }}">
                                                                        <button type="button" class="btn btn-primary">Download</button>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    @else
                                                        @foreach ($budgeting_realization->where('admin_id', auth()->user()->admin_id)->where('user_id', auth()->user()->id) as $budgeting_realization)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex justify-content-start flex-column">
                                                                        <h1 href="#" class="text-dark fw-normal fs-6">{{$budgeting_realization->created_at}}</h1>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->item_name}}</h1>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->role->name}}</h1>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h1 class="text-dark fw-normal fs-6">Rp.
                                                                        <script>
                                                                            var bilangan = {{$budgeting_realization->requirement}};

                                                                            var	number_string = bilangan.toString(),
                                                                                sisa 	= number_string.length % 3,
                                                                                rupiah 	= number_string.substr(0, sisa),
                                                                                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                                            if (ribuan) {
                                                                                separator = sisa ? '.' : '';
                                                                                rupiah += separator + ribuan.join('.');
                                                                            }

                                                                            document.write(rupiah);
                                                                        </script>
                                                                    </h1>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->description}}</h1>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center justify-content-end">
                                                                    @if ($budgeting_realization->attachment != null)
                                                                    <a href="{{ route('download', $budgeting_realization->id) }}">
                                                                        <button type="button" class="btn btn-primary">Download</button>
                                                                    </a>
                                                                    @else
                                                                    <h1 class="text-dark fw-normal fs-6">File Not Inputed</h1>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    @endif
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
		<script>
			var avatar1 = new KTImageInput('kt_image_1');
		</script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
