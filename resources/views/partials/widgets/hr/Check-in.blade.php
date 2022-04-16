
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull shadow-sm border" data-scroll="true" data-wheel-propagation="true">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label fw-bolder fs-3 mb-1">Daily Check-in</span>
												<span class="text-muted mt-1 fw-bold fs-7">1 Data</span>
											</h3>
											@if (auth()->user()->role_id == 1)
											<form action="/dashboard" method="GET" class="d-flex">
											@endif
											<form action="/adv" method="GET" class="d-flex mt-n3">
												<div class="me-2 d-flex flex-row">
													<input class="form-control text-muted mt-0" name="date_filter"  id="date_filter" type="date" style="height: 33px;" onchange="submit()">
												</div>
											</form>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body py-3">
											<!--begin::Table container-->
											<div class="table-responsive">
												<!--begin::Table-->
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="staff">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-bolder text-muted">
															<th class="">No</th>
															<th class="">Name</th>
															<th class="">Reason</th>
															<th class="">Description</th>
															<th class="">Time</th>
															<th class=" text-end">Action</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 class="text-dark fw-normal fs-6">1</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 class="text-dark fw-normal fs-6">Zall</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Absence</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Lorem ipsum dolor sit amet, consectetur ...</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">27/12/2021</h1>
																</div>
															</td>
															<td class="d-flex align-items-center justify-content-end">
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
																		<a href="" class="menu-link px-3">Edit</a>
																	</div>
																	<!--end::Menu item-->
																	<!--begin::Menu item-->
																	<div class="menu-item px-3">
																		<a href="" class="menu-link px-3" >Delete</a>
																		{{-- data-kt-customer-table-filter="delete_row" --}}
																	</div>
																	<!--end::Menu item-->
																</div>
																<!--end::Menu-->
															</td>
														</tr>
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
