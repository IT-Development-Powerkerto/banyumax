
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Lead Tunneling</span>
												<span class="text-muted mt-1 fw-bold fs-7">
                                                    <script>
                                                        var bilangan = {{$lead->count()}};

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
                                                </span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
												<a href=/ld class="btn btn-sm btn-light btn-active-primary me-2" title="Click For Detail">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<i class="fas fa-chart-line"></i>
												</span>
												<!--end::Svg Icon-->Detail</a>
												<form action="/dashboard" method="GET" class="d-flex">
												<div class="me-2">
													<input class="form-control mt-0" name="date_filter" id="date_filter" type="date" style="height: 33px;" onkeypress="submit()">
												</div>
												</form>

												<form action="#" method="GET" class="d-flex">
													<input class="form-control mt-0" name="search" id="searchlead" type="text" placeholder="Search" aria-label="Search" style="height: 33px;">
													<button class="btn mt-n2" type="submit" style="height: 30px;"><i class="fas fa-search fas-7x"></i></button>
												</form>
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
                                                            <th class=" text-center">Admin Name</th>
															<th class=" text-center">Email</th>
															<th class=" text-center">Username</th>
															<th class=" text-center">Date/Time</th>
															<th class=" text-center">Total Closing</th>
															<th class=" text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php $n=0; ?>
                                                        @foreach ($lead as $lead)
														<tr>
															<td>

																<div class="d-flex align-items-center justify-content-start">
																	<h1 class="text-dark fw-normal fs-6">1</h1>
																</div>
															</td>
                                                            <td>
																<div class="d-flex align-items-center justify-content-center">
																	<h1 class="text-primary fw-normal fs-6">Admin Zall</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center justify-content-center">
																	<h1 class="text-dark fw-normal fs-6">Client</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center justify-content-center">
																	<h1 class="text-dark fw-normal fs-6" href="#">081245527645</h1>

																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$n+=1}}</h1>
																</div>
															</td>
                                                            <td>
																<div class="d-flex align-items-center">

																	<h1 class="text-dark fw-normal fs-6">Ord-{{$lead->id}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$lead->advertiser}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$lead->operator_name}}</h1>

																	<h1 class="text-dark fw-normal fs-6">Admin Zall</h1>

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
																	<a class="text-primary fw-normal fs-6 text-hover-primary" href="https://api.whatsapp.com/send/?phone={{$lead->client_wa}}&text={{ str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($lead->client_name, $lead->client_wa, $lead->operator_name, $lead->product_name), $lead->text) }}">{{$lead->client_wa}}</a>

																</div>
															</td>
															<td>
																<div class="d-flex align-items-center justify-content-center">
																	<h1 class="text-dark fw-normal fs-6">Created At</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center justify-content-center">
																	<h1 class="text-dark fw-normal fs-6">Closing 5</h1>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="#" method="GET">
                                                                        @csrf
																		<button type="button" class="btn btn-sm btn-light btn-active-primary me-2" title="Click For Export" data-bs-toggle="modal" data-bs-target="#exampleModal">
																			<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
																			<span class="svg-icon svg-icon-3">
																				<i class="fas fa-chart-line"></i>
																			</span>
																			<!--end::Svg Icon-->Detail</button>
                                                                    </form>
																</div>
															</td>
														</tr>
                                                        @endforeach
													</tbody>
													<!--end::Table body-->
												</table>
												{{--  {{ $leads->links() }}  --}}
												<!--end::Table-->
											</div>
											<!--end::Table container-->
										</div>
										<!--begin::Body-->
									</div>
									<!--end::Tables Widget 9-->
