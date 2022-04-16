
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Lead Tunneling</span>
                                            @if (auth()->user()->role_id == 1)
                                                <span class="text-muted mt-1 fw-bold fs-7">{{$all_leads->count()}} Lead {{$all_spam->count()}} Spam</span>
                                            @else
                                                <span class="text-muted mt-1 fw-bold fs-7">{{$all_leads->where('advertiser', auth()->user()->name)->count()}} Lead {{$all_spam->where('advertiser', auth()->user()->name)->count()}} Spam</span>
                                            @endif
											</h3>
											<audio controls autoplay hidden>
												<source src="assets/notif/notif.mp3" type="audio/mpeg">
											</audio>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
												<a href=/ld class="btn btn-sm btn-light btn-active-primary me-2" title="Click For Detail">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<i class="fas fa-chart-line"></i>
												</span>
												<!--end::Svg Icon-->Detail</a>
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-sm btn-light btn-active-primary me-2" title="Click For Export" data-bs-toggle="modal" data-bs-target="#exampleModal">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
													<span class="svg-icon svg-icon-3">
														<i class="las la-print" style="font-size: 18px"></i>
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
																			<h3 class="text-center text-dark fw-bolder fs-6 pt-3">Until</h3>
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
														<input class="form-control mt-0" name="date_filter"  id="date_filter" type="date" style="height: 33px;" onchange="submit()">
														<button type="button" class="btn btn-sm btn-light btn-active-primary ms-2" title="Click For Export">GO</button>
													</div>
												</form>
												
												{{-- <form action="#" method="GET" class="d-flex">
													<input class="form-control mt-0" name="search" id="searchlead" type="text" placeholder="Search" aria-label="Search" style="height: 33px;">
													<button class="btn mt-n2" type="submit" style="height: 30px;"><i class="fas fa-search fas-7x"></i></button>
												</form> --}}
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body py-3">
											<!--begin::Table container-->
											<div class="table-responsive" id="myDIV">
												<!--begin::Table-->
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="leads">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-medium text-muted">
															<th class=" text-center">No</th>
                                                            <th class=" text-center">Order ID</th>
															<th class=" text-center">Advertiser Name</th>
															<th class=" text-center">Operator Name</th>
															<th class=" text-center">Customer Name</th>
															<th class=" text-center">Whatsapp Customer</th>
															<th class=" text-center">Product Name</th>
															<th class=" text-center">Date/Time</th>
															<th class=" text-center">Response Time</th>
															<th class=" text-center">Lead Progress</th>
															<th class=" text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php $n=0; ?>
                                                            @foreach ($leads as $lead)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$n+=1}}</h1>
																</div>
															</td>
                                                            <td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Ord-{{ $lead->id }}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{ $lead->advertiser }}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{ $lead->operator_name  }}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-primary fw-normal fs-6 text-hover-primary">{{$lead->client_name}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	{{--  <h1 class="text-dark fw-normal fs-6">{{$lead->client_wa}}</h1>  --}}
																	{{--  <a class="text-dark fw-normal fs-6 text-hover-primary" href="https://api.whatsapp.com/send/?phone={{$lead->no_wa}}&text={{ $lead->text }}">{{$lead->no_wa}}</a>  --}}
																	<a class="text-primary fw-normal fs-6 text-hover-primary" href="https://api.whatsapp.com/send/?phone={{$lead->client_wa}}&text={{ rawurlencode(str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($lead->client_name, $lead->client_wa, $lead->operator_name, $lead->product_name), $lead->text)) }}">{{$lead->client_wa}}</a>
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
                                                                    <script>
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
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal	 fs-6 badge badge-light-info">{{ $lead->status }}</h1>
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
												{{--  {{ $leads->links() }}  --}}
												{{ $leads->appends(Request::all())->links() }}
												<!--end::Table-->
											</div>
											<!--end::Table container-->
										</div>
										<!--begin::Body-->
									</div>
									<!--end::Tables Widget 9-->
									{{--  <script>
										function exportTasks(_this) {
											let _url = $(_this).data('href');
											window.location.href = _url;
										}
									</script>  --}}
