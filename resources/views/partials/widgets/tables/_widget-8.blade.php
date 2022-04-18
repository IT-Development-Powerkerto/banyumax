
							<!--begin::Card-->
							<div class="card card-xxl-stretch mb-5 mb-xl-8">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column mt-n3">
										<span class="card-label text-white fw-bolder fs-3 mb-1">Lead Tunneling</span>
									@if (auth()->user()->role_id == 1 || auth()->user()->role_id == 12)
										<span class="text-white mt-1 fw-bold fs-7">
                                            <script>
                                                var bilangan = {{$all_leads->count()}};

                                                var	number_string = bilangan.toString(),
                                                    sisa 	= number_string.length % 3,
                                                    rupiah 	= number_string.substr(0, sisa),
                                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                if (ribuan) {
                                                    separator = sisa ? '.' : '';
                                                    rupiah += separator + ribuan.join('.');
                                                }

                                                document.write(rupiah);
                                            </script> Lead
                                            <script>
                                                var bilangan = {{$all_spam->count()}};

                                                var	number_string = bilangan.toString(),
                                                    sisa 	= number_string.length % 3,
                                                    rupiah 	= number_string.substr(0, sisa),
                                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                if (ribuan) {
                                                    separator = sisa ? '.' : '';
                                                    rupiah += separator + ribuan.join('.');
                                                }

                                                document.write(rupiah);
                                            </script> Spam
                                        </span>
									@else
										<span class="text-white mt-1 fw-bold fs-7">
                                            <script>
                                                var bilangan = {{$all_leads->where('advertiser', auth()->user()->name)->count()}};

                                                var	number_string = bilangan.toString(),
                                                    sisa 	= number_string.length % 3,
                                                    rupiah 	= number_string.substr(0, sisa),
                                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                if (ribuan) {
                                                    separator = sisa ? '.' : '';
                                                    rupiah += separator + ribuan.join('.');
                                                }

                                                document.write(rupiah);
                                            </script> Lead
                                            <script>
                                                var bilangan = {{$all_spam->where('advertiser', auth()->user()->name)->count()}};

                                                var	number_string = bilangan.toString(),
                                                    sisa 	= number_string.length % 3,
                                                    rupiah 	= number_string.substr(0, sisa),
                                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                if (ribuan) {
                                                    separator = sisa ? '.' : '';
                                                    rupiah += separator + ribuan.join('.');
                                                }

                                                document.write(rupiah);
                                            </script> Spam
                                        </span>
									@endif
									</h3>
									<audio controls autoplay hidden>
										<source src="assets/notif/notif.mp3" type="audio/mpeg">
									</audio>
									<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
										<a href=/ld class="btn btn-sm btn-light btn-active-primary me-2 text-hover-white" title="Click For Detail" style="color: #00509d;">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-3">
												<i class="fas fa-chart-line" style="color: #00509d;"></i>
											</span>
											<!--end::Svg Icon-->Detail</a>
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-sm btn-light btn-active-primary me-2 text-hover-white" title="Click For Export" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: #00509d;">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<i class="las la-print" style="font-size: 18px; color: #00509d;"></i>
												</span>
												<!--end::Svg Icon-->Export</button>

											<!-- Modal -->
										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">

													<form action="{{ route('export-lead')}}" method="GET">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Export To Excel</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<div class="row align-items-center col-12 pb-5">
																<div class="col-5">
																	<input class="form-control mt-0" name="from_date"  id="from_date" type="date" style="height: 33px;">
																</div>
																<div class="col-2">
																	<h3 class= "text-dark fw-bolder fs-6 pt-3">Until</h3>
																</div>
																<div class="col-5">
																	<input class="form-control mt-0" name="to_date"  id="to_date" type="date" style="height: 33px;">
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn btn-sm btn-primary btn-active-info me-2" title="Click For Export">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
															<span class="svg-icon svg-icon-3">
																<i class="las la-print" style="font-size: 18px"></i>
															</span>
															<!--end::Svg Icon-->Export</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										@if (auth()->user()->role_id == 1)
										<form action="/dashboard" method="GET" class="d-flex">
										@elseif (auth()->user()->role_id == 4)
										<form action="/adv" method="GET" class="d-flex">
										@else
										<form action="/JA-adv" method="GET" class="d-flex">
										@endif
											<div class="me-2 d-flex flex-row">
												<input class="form-control mt-0 form-control-solid" name="date_filter"  id="date_filter" type="date" style="height: 33px;" value="{{ $day }}" onchange="submit()">
											</div>
										</form>
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-6">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
													<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" style="height: 33px;" placeholder="Search Leads" />
										</div>
										<!--end::Search-->
										{{-- <form action="#" method="GET" class="d-flex">
											<input class="form-control mt-0" name="search" id="searchlead" type="text" placeholder="Search" aria-label="Search" style="height: 33px;">
											<button class="btn mt-n2" type="submit" style="height: 30px;"><i class="fas fa-search fas-7x"></i></button>
										</form> --}}
									</div>
								</div>
								<!--end::Header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-gray-400 fw-bolder fs-8 text-uppercase gs-0">
												<th class="min-w-75px">Order ID</th>
												<th class="min-w-125px">Advertiser Name</th>
												<th class="min-w-150px">Operator Name</th>
												<th class="">Customer</th>
												<th class="">Whatsapp</th>
												<th class="">Product</th>
												<th class="min-w-150px">Date/Time</th>
												<th class="">Response</th>
												<th class="">Status</th>
												<th class="text-end">Actions</th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="fw-bold text-gray-600">
											@foreach ($leads as $lead)
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<h1 class="text-dark fw-normal fs-6">Ord-{{ $lead->id}}</h1>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<h1 class="text-dark fw-normal fs-6">{{ $lead->advertiser}}</h1>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<h1 class="text-dark fw-normal fs-6">{{ $lead->operator_name}}</h1>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<h1 class="text-primary fw-normal fs-6 text-hover-primary">{{$lead->client_name ?? 'From Wa'}}</h1>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<a class="text-primary fw-normal fs-6 text-hover-primary mt-n2" href="https://api.whatsapp.com/send/?phone={{$lead->client_wa}}&text={{ rawurlencode(str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($lead->client_name, $lead->client_wa, $lead->operator_name, $lead->product_name), $lead->text)) }}">{{$lead->client_wa ?? 'From Wa'}}</a>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<h1 class="text-dark fw-normal fs-6">{{$lead->product_name}}</h1>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<h1 class="text-dark fw-normal fs-6">{{$lead->client_created_at}}</h1>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center clock{{ $lead->id }}">
														<script type="text/javascript">
															window.addEventListener('load', function() {
																var createdDate = new Date('{{$lead->client_created_at}}');
																var updatedDate = new Date('{{$lead->client_updated_at}}');
																var nowDate = new Date();
																if('{{$lead->status_id == 3}}'){
																	// var futureDate = new Date(createdDate.getTime() - 0);
																	// var dif = (nowDate.getTime() - futureDate.getTime()) / 1000;
																	var dif = (nowDate.getTime() - createdDate.getTime()) / 1000;
																	var Seconds_Between_Dates = Math.abs(Math.round(dif));
																	var fiveMinutes{{ $lead->id}} = Seconds_Between_Dates;
																	display = document.querySelector('.clock{{ $lead->id }}');
																	CountUpTimer(fiveMinutes{{$lead->id}}, display);
																} else {
																	var dif = (createdDate.getTime() - updatedDate.getTime()) / 1000;
																	var Seconds_Between_Dates = Math.abs(Math.round(dif));
																	var fiveMinutes{{ $lead->id}} = Seconds_Between_Dates;
																	display = document.querySelector('.clock{{ $lead->id }}');
																	StopTimer(fiveMinutes{{$lead->id}}, display);
																}
															});
														</script>
                                                        <script type="text/javascript">
															window.addEventListener('click', function() {
																var createdDate = new Date('{{$lead->client_created_at}}');
																var updatedDate = new Date('{{$lead->client_updated_at}}');
																var nowDate = new Date();
																if('{{$lead->status_id == 3}}'){
																	// var futureDate = new Date(createdDate.getTime() - 0);
																	// var dif = (nowDate.getTime() - futureDate.getTime()) / 1000;
																	var dif = (nowDate.getTime() - createdDate.getTime()) / 1000;
																	var Seconds_Between_Dates = Math.abs(Math.round(dif));
																	var fiveMinutes{{ $lead->id}} = Seconds_Between_Dates;
																	display = document.querySelector('.clock{{ $lead->id }}');
																	CountUpTimer(fiveMinutes{{$lead->id}}, display);
																} else {
																	var dif = (createdDate.getTime() - updatedDate.getTime()) / 1000;
																	var Seconds_Between_Dates = Math.abs(Math.round(dif));
																	var fiveMinutes{{ $lead->id}} = Seconds_Between_Dates;
																	display = document.querySelector('.clock{{ $lead->id }}');
																	StopTimer(fiveMinutes{{$lead->id}}, display);
																}
															});
														</script>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<h1 class="text-dark fw-normal fs-6 badge badge-light-info">{{ $lead->status }}</h1>
													</div>
												</td>
												<td>
													<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
														<form action="{{ route('lead.edit',['lead' => $lead->id]) }}" method="GET">
															@csrf
															<div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
																<div class="btn-group" role="group" aria-label="First group">
																	<button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" title="Click to edit data customer" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></button>
																</div>
															</div>
														</form>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
