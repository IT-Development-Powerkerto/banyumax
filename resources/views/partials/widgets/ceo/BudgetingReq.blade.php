
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 d-flex flex-row justify-content-between">
										<div class="card shadow-sm">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5" style="background-color: #00509d;">
												<h3 class="card-title align-items-start flex-column mt-n3">
													<span class="card-label text-white fw-bolder fs-3 mb-1">Budgeting Req ADV</span>
													<span class="text-white mt-1 fw-bold fs-7">{{$budgeting_adv->where('admin_id', auth()->user()->admin_id)->where('requirement', '>=', 1000000)->count()}} Request</span>
												</h3>
												<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">

													<form action="/ceo" method="GET" class="d-flex">
														<div class="me-2 d-flex flex-row">
															<input class="form-control text-muted mt-0" name="date_filter"  id="date_filter" type="date" style="height: 33px;" onchange="submit()">
														</div>
													</form>
												</div>
											</div>
											<!--end::Header-->
											<!--end::Header-->
											<!--begin::Body-->
										    <div class="card-body py-3 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
														<!--begin::Table head-->
														<thead>
															<tr class="fw text-muted">
																<th class="">No</th>
																<th class="">Name</th>
																<th class="">Request</th>
																<th class="">Target</th>
																<th class="">Status</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
                                                            <?php
                                                                $n=0;
                                                            ?>
                                                            @foreach ($budgeting_adv->where('admin_id', auth()->user()->admin_id)->where('requirement', '>=', 1000000) as $budgeting_adv)
															<tr>
																<td class="text-end">
																	<div class="d-flex align-items-center">
																		<h1 class="text-dark fw-normal fs-6">{{$n+=1}}</h1>
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<h1 class="text-dark fw-normal fs-6">{{$budgeting_adv->user_name}}</h1>
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<h1 class="text-dark fw-normal fs-6">Rp.
                                                                            <script>
                                                                                var bilangan = {{$budgeting_adv->requirement}};

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
																<td class="">
																	<div class="d-flex align-items-center">
																		<h1 class="text-dark fw-normal fs-6">Rp.
                                                                            <script>
                                                                                var bilangan = {{$budgeting_adv->target}};

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
																<td class="">
																	<div class="d-flex align-items-center">
                                                                        @if ($budgeting_adv->status == 1)
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-light-success">Approve</h1>
                                                                        @elseif ($budgeting_adv->status == 0)
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-light-danger">Rejected</h1>
                                                                        @else
																		    <h1 class="text-dark fw-normal fs-6 badge badge-light-info">Wait</h1>
                                                                        @endif
																	</div>
																</td>
																<td class="d-flex align-items-center justify-content-end mb-3">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary ms-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
																		<span class="svg-icon svg-icon-5 m-0">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
																			</svg>
																		</span>
																		<!--end::Svg Icon--></a>
																		<!--begin::Menu-->
																	<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="{{route('ceo.approve', ['id' => $budgeting_adv->id])}}" class="menu-link px-3">Approve</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="{{route('ceo.reject', ['id' => $budgeting_adv->id])}}" class="menu-link px-3" >Reject</a>
																			{{-- data-kt-customer-table-filter="delete_row" --}}
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu-->
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
										<div class="card shadow-sm">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5" style="background-color: #00509d;">
												<h3 class="card-title align-items-start flex-column mt-n3">
													<span class="card-label text-white fw-bolder fs-3 mb-1">Budgeting Req nonADV</span>
													<span class="text-white mt-1 fw-bold fs-7">{{$budgeting_nonadv->where('admin_id', auth()->user()->admin_id)->where('requirement', '>=', 1000000)->count()}} Request</span>
												</h3>
												<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
													<form action="/dashboard" method="GET" class="d-flex">
													<form action="/adv" method="GET" class="d-flex">
														<div class="me-2 d-flex flex-row">
															<input class="form-control text-muted mt-0" name="date_filter"  id="date_filter" type="date" style="height: 33px;" onchange="submit()">
														</div>
													</form>
												</div>
											</div>
											<!--end::Header-->
											<!--end::Header-->
											<!--begin::Body-->
										    <div class="card-body py-3 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
														<!--begin::Table head-->
														<thead>
															<tr class="fw text-muted">
																<th class="">No</th>
																<th class="">Division</th>
																<th class="">Request</th>
																<th class="">Attachment</th>
																<th class="">Status</th>
																<th class="text-end">Actions</th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
                                                            <?php
                                                                $n=0;
                                                            ?>
                                                            @foreach ($budgeting_nonadv->where('admin_id', auth()->user()->admin_id)->where('requirement', '>=', 1000000) as $budgeting_nonadv)
															<tr>
																<td class="text-end">
																	<div class="d-flex align-items-center">
																		<h1 class="text-dark fw-normal fs-6">{{$n+=1}}</h1>
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<h1 class="text-dark fw-normal fs-6">{{$budgeting_nonadv->role->name}}</h1>
																	</div>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<h1 class="text-dark fw-normal fs-6">Rp.
                                                                            <script>
                                                                                var bilangan = {{$budgeting_nonadv->requirement}};

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
																<td class="d-flex align-items-start mb-4">
																	<a href="{{ route('downloaded', $budgeting_nonadv->id) }}" class="btn-active-light-primary ms-3">
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
																		<span class="svg-icon svg-icon-5 m-0">
																			<i class="las la-file-alt" style="font-size:18px"></i>
																		</span>
																		<!--end::Svg Icon-->File</a>
																</td>
																<td class="">
																	<div class="d-flex align-items-center">
																		@if ($budgeting_nonadv->status == 1)
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-light-success">Approve</h1>
                                                                        @elseif ($budgeting_nonadv->status == 0)
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-light-danger">Rejected</h1>
                                                                        @else
																		    <h1 class="text-dark fw-normal fs-6 badge badge-light-info">Wait</h1>
                                                                        @endif
																	</div>
																</td>
																<td class="d-flex align-items-center justify-content-end mb-3">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary ms-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
																		<span class="svg-icon svg-icon-5 m-0">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
																			</svg>
																		</span>
																		<!--end::Svg Icon--></a>
																		<!--begin::Menu-->
																	<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="{{route('ceo.approve', ['id' => $budgeting_nonadv->id])}}" class="menu-link px-3">Approve</a>
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="{{route('ceo.reject', ['id' => $budgeting_nonadv->id])}}" class="menu-link px-3" >Reject</a>
																			{{-- data-kt-customer-table-filter="delete_row" --}}
																		</div>
																		<!--end::Menu item-->
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="{{ route('downloaded', $budgeting_nonadv->id) }}" class="menu-link px-3" >Download File</a>
																			{{-- data-kt-customer-table-filter="delete_row" --}}
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu-->
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
									</div>
									<!--end::Tables Widget 9-->
