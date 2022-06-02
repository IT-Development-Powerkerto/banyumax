<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Campaign</title>
		<link rel="icon" href="img/favicon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
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
						<!--begin::Container-->
						<div class="container-xxl d-flex align-items-center justify-content-between" id="kt_header_container">
							<!--begin::Page title-->
							@include('layout/header/_baseADV')


							@include('layout/_toolbar')
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						@if(session()->has('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								{{ session('success') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif

						@if(session()->has('error'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								{{ session('error') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Tables Widget 11-->
							<div class="card card-xxl-stretch mb-5 mb-xl-8">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column mt-n3">
										<span class="card-label fw-bolder fs-3 mb-1">Campaign {{ $campaigns->title }}</span>
										<span class="text-muted mt-1 fw-bold fs-7">
                                            <script>
                                                var bilangan = {{$operatorCampaigns->count()}};

                                                var	number_string = bilangan.toString(),
                                                    sisa 	= number_string.length % 3,
                                                    rupiah 	= number_string.substr(0, sisa),
                                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                if (ribuan) {
                                                    separator = sisa ? '.' : '';
                                                    rupiah += separator + ribuan.join('.');
                                                }

                                                document.write(rupiah);
                                            </script> Operator
                                        </span>
									</h3>
									<div class="card-toolbar mt-n3" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a Operator">
										<a href="" data-bs-toggle="modal" data-bs-target="#add-operator" class="btn btn-sm btn-light btn-active-primary">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-3">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Add Operator</a>
									</div>
									<div class="modal fade" tabindex="-1" id="add-operator">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Add Operator</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													{{--  <form action="{{route('addOperator.store')}}" method="POST">  --}}
													<form action="{{route('addOperator.store', ['campaign' => $campaigns->id])}}" method="POST">
														@csrf

														<div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="inputtitle" class="col-form-label">Operator</label>
															</div>
															{{-- <div class="col-10">

																 <input type="text" name="campaign_id" value="{{ $campaigns->id }}" required class="form-control">
																<select class="form-control" name="operator_id">
																	<option hidden>Select Operator</option>
																	@foreach ($operators as $operator)
																		<option value="{{ $operator->id }}">
																			{{ $operator->name }}
																		</option>
																	@endforeach
																</select>
															</div>

															<div class="col-2">
																<label for="inputtitle" class="col-form-label">Add Operator</label>
															</div> --}}
															<div class="col-10">
																<select class="form-control select2" id="kt_select2_3" name="user_id[]" multiple="multiple">
																	{{-- <option hidden>Select Operator</option> --}}
																	@foreach ($operators as $operator)
																		<option value="{{ $operator->id }}">
																			{{ $operator->name }}
																		</option>
																	@endforeach
																</select>
															</div>
														</div>
														<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add"/>
													</form>
												</div>
											</div>
										</div>
									</div>

								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body py-3 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
									<!--begin::Table container-->
									<div class="table-responsive">
										<!--begin::Table-->
										<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr class="fw-bolder text-muted">
													<th class="">No</th>
													<!-- <th class="min-w-30px">Status</th> -->
													<th class="">Name</th>
													<th class="">Email</th>
													<th class="">Whatsapp</th>
													<th class="">Assign To</th>
													<th class="">Leads</th>
													<th class="">Closing</th>
													{{-- <th class="min-w-200px">Closing Rate</th> --}}
													<th class="">Actions</th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
                                                <?php $n=0; ?>
												@foreach ($operatorCampaigns as $operatorCampaign)
												<tr>
													<td>
														<label class="text-dark fw-normal text-hover-primary d-block fs-6">{{ $n+=1 }}</label>
													</td>
													<td>
														<label class="text-dark fw-normal text-hover-primary d-block fs-6">{{ $operatorCampaign->user->name }}</label>
													</td>
													<td>
														<label class="text-dark fw-normal text-hover-primary d-block fs-6">{{ $operatorCampaign->user->email }}</label>
													</td>
													<td>
														<label class="text-dark fw-normal text-hover-primary d-block fs-6">{{ $operatorCampaign->user->phone }}</label>
													</td>
													<td>
														<label class="text-dark fw-normal text-hover-primary d-block fs-6">
                                                            <script>
                                                                var bilangan = {{$operatorCampaign->user->operator->count()}};

                                                                var	number_string = bilangan.toString(),
                                                                    sisa 	= number_string.length % 3,
                                                                    rupiah 	= number_string.substr(0, sisa),
                                                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                                if (ribuan) {
                                                                    separator = sisa ? '.' : '';
                                                                    rupiah += separator + ribuan.join('.');
                                                                }

                                                                document.write(rupiah);
                                                            </script> Campaigns
                                                        </label>
													</td>
													<td>
                                                        <div class="timeline-desc timeline-desc-light-primary">
                                                            <span class="fw-mormal text-gray-800">
                                                                <script>
                                                                    var bilangan = {{$lead_day->where('user_id', $operatorCampaign->user->id)->count()}};

                                                                    var	number_string = bilangan.toString(),
                                                                        sisa 	= number_string.length % 3,
                                                                        rupiah 	= number_string.substr(0, sisa),
                                                                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                                    if (ribuan) {
                                                                        separator = sisa ? '.' : '';
                                                                        rupiah += separator + ribuan.join('.');
                                                                    }

                                                                    document.write(rupiah);
                                                                </script> Daily Leads
                                                            </span>
                                                            <p class="fw-bolder">
                                                                <script>
                                                                    var bilangan = {{$operatorCampaign->lead->count()}};

                                                                    var	number_string = bilangan.toString(),
                                                                        sisa 	= number_string.length % 3,
                                                                        rupiah 	= number_string.substr(0, sisa),
                                                                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                                    if (ribuan) {
                                                                        separator = sisa ? '.' : '';
                                                                        rupiah += separator + ribuan.join('.');
                                                                    }

                                                                    document.write(rupiah);
                                                                </script> Total Leads
                                                            </p>
                                                        </div>
													</td>
													<td>
                                                        <div class="timeline-desc timeline-desc-light-primary">
                                                            <span class="fw-mormal text-gray-800">
                                                                <script>
                                                                    var bilangan = {{$lead_day->where('user_id', $operatorCampaign->user->id)->where('status_id', 5)->count()}};

                                                                    var	number_string = bilangan.toString(),
                                                                        sisa 	= number_string.length % 3,
                                                                        rupiah 	= number_string.substr(0, sisa),
                                                                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                                    if (ribuan) {
                                                                        separator = sisa ? '.' : '';
                                                                        rupiah += separator + ribuan.join('.');
                                                                    }

                                                                    document.write(rupiah);
                                                                </script> Daily Closing
                                                            </span>
                                                            <p class="fw-bolder">
                                                                <script>
                                                                    var bilangan = {{$operatorCampaign->lead->where('status_id', 5)->count()}};

                                                                    var	number_string = bilangan.toString(),
                                                                        sisa 	= number_string.length % 3,
                                                                        rupiah 	= number_string.substr(0, sisa),
                                                                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                                    if (ribuan) {
                                                                        separator = sisa ? '.' : '';
                                                                        rupiah += separator + ribuan.join('.');
                                                                    }

                                                                    document.write(rupiah);
                                                                </script> Total Closing
                                                            </p>
                                                        </div>
													</td>
													{{-- <td> --}}
														{{-- <label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $operatorCampaign->user->closing_rate[0]->month_closing_rate }}</label> --}}

                                                        {{-- <label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $closing_rate = $operatorCampaign->user->closing_rate->last() }}</label> --}}
													{{-- </td> --}}
													<td>
														<form action="{{route('addOperator.destroy',['campaign' => $operatorCampaign->campaign_id, 'operator' => $operatorCampaign->id])}}" method="POST">
															@csrf
															@method('DELETE')
															<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
																<div class="btn-group" role="group" aria-label="First group">
																	<button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Jadi Delete Kah ?')"><i class="la la-trash"></i></button>
																</div>
															</div>
														</form>
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
							<!--end::Tables Widget 11-->
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
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
				var postURL = "<?php echo url('addProduct'); ?>";
				var i=1;

				$('#add').click(function(){
					i++;
					$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="user_id[]" placeholder="Enter Operator" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
				});

				$(document).on('click', '.btn_remove', function(){
					var button_id = $(this).attr("id");
					$('#row'+button_id+'').remove();
				});

				$.ajaxSetup({
					headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			function previewMessage (msg) {
				$(".error-message-display").find("ul").html('');
				$(".error-message-display").css('display','block');
				$(".print-success-msg").css('display','none');

				$.each( msg, function( key, value ) {
                    $(".error-message-display").find("ul").append('<li>'+value+'</li>');
                });
            }
		});
        </script>
        <script>
            $(document).ready(function() {
                $('#product_id').on('change', function() {
                    var roleId = $(this).val();
                    if(roleId) {
                        $.ajax({
                            url: '/getRole/'+roleId,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data);
                        });
                    }
                });
            });
        </script>
		<script>
			// Class definition
			var KTSelect2 = function() {
			// Private functions
			var demos = function() {
			// basic
			$('#kt_select2_1').select2({
			placeholder: "Select a state"
			});

			// nested
			$('#kt_select2_2').select2({
			placeholder: "Select a state"
			});

			// multi select
			$('#kt_select2_3').select2({
			placeholder: "Select a operator",
			});

			// basic
			$('#kt_select2_4').select2({
			placeholder: "Select a state",
			allowClear: true
			});

			// loading data from array
			var data = [{
			id: 0,
			text: 'Enhancement'
			}, {
			id: 1,
			text: 'Bug'
			}, {
			id: 2,
			text: 'Duplicate'
			}, {
			id: 3,
			text: 'Invalid'
			}, {
			id: 4,
			text: 'Wontfix'
			}];

			$('#kt_select2_5').select2({
			placeholder: "Select a value",
			data: data
			});

			// loading remote data

			function formatRepo(repo) {
			if (repo.loading) return repo.text;
			var markup = "<div class='select2-result-repository clearfix'>" +
				"<div class='select2-result-repository__meta'>" +
				"<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
			if (repo.description) {
				markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
			}
			markup += "<div class='select2-result-repository__statistics'>" +
				"<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
				"<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
				"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
				"</div>" +
				"</div></div>";
			return markup;
			}

			function formatRepoSelection(repo) {
			return repo.full_name || repo.text;
			}

			$("#kt_select2_6").select2({
			placeholder: "Search for git repositories",
			allowClear: true,
			ajax: {
				url: "https://api.github.com/search/repositories",
				dataType: 'json',
				delay: 250,
				data: function(params) {
				return {
				q: params.term, // search term
				page: params.page
				};
				},
				processResults: function(data, params) {
				// parse the results into the format expected by Select2
				// since we are using custom formatting functions we do not need to
				// alter the remote JSON data, except to indicate that infinite
				// scrolling can be used
				params.page = params.page || 1;

				return {
				results: data.items,
				pagination: {
				more: (params.page * 30) < data.total_count
				}
				};
				},
				cache: true
			},
			escapeMarkup: function(markup) {
				return markup;
			}, // let our custom formatter work
			minimumInputLength: 1,
			templateResult: formatRepo, // omitted for brevity, see the source of this page
			templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
			});

			// custom styles

			// tagging support
			$('#kt_select2_12_1, #kt_select2_12_2, #kt_select2_12_3, #kt_select2_12_4').select2({
			placeholder: "Select an option",
			});

			// disabled mode
			$('#kt_select2_7').select2({
			placeholder: "Select an option"
			});

			// disabled results
			$('#kt_select2_8').select2({
			placeholder: "Select an option"
			});

			// limiting the number of selections
			$('#kt_select2_9').select2({
			placeholder: "Select an option",
			maximumSelectionLength: 2
			});

			// hiding the search box
			$('#kt_select2_10').select2({
			placeholder: "Select an option",
			minimumResultsForSearch: Infinity
			});

			// tagging support
			$('#kt_select2_11').select2({
			placeholder: "Your Destination",
			tags: true
			});

			// disabled results
			$('.kt-select2-general').select2({
			placeholder: "Select an option"
			});
			}

			var modalDemos = function() {
			$('#kt_select2_modal').on('shown.bs.modal', function () {
			// basic
			$('#kt_select2_1_modal').select2({
				placeholder: "Select a state"
			});

			// nested
			$('#kt_select2_2_modal').select2({
				placeholder: "Select a state"
			});

			// multi select
			$('#kt_select2_3_modal').select2({
				placeholder: "Select a state",
			});

			// basic
			$('#kt_select2_4_modal').select2({
				placeholder: "Select a state",
				allowClear: true
			});
			});
			}

			// Public functions
			return {
			init: function() {
			demos();
			modalDemos();
			}
			};
			}();

			// Initialization
			jQuery(document).ready(function() {
			KTSelect2.init();
			});
		</script>
	</body>
	<!--end::Body-->
</html>
