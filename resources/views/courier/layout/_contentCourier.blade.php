										
									<!--begin::Container-->
									<div id="kt_content_container" class="container-xxl" >
										<div class="mt-10">
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
										</div>				
										<!--begin::Tables Widget 9-->
										<div class="card card-xl-stretch mt-12 mb-5 mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5 ">
												<h3 class="card-title align-items-start flex-column mt-n3">
													<span class="card-label fw-bolder fs-3 mb-1">Courier</span>
													<span class="text-muted mt-1 fw-bold fs-7">{{ count($couriers) }}</span>
												</h3>
												<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
													<button type="button" class="btn btn-sm btn-light btn-active-primary me-2" data-bs-toggle="modal" data-bs-target="#addCourier">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
													<span class="svg-icon svg-icon-3">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
															<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->Add Courier</button>

													<!-- Modal -->
													<div class="modal fade" id="addCourier" tabindex="-1" aria-labelledby="addCourier" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Add Courier</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<form action="{{ route('courier.store') }}" method="POST" enctype="multipart/form-data">
																	<div class="modal-body">
																		@csrf
																		<!--begin::Input group-->
																		<div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9 d-flex justify-content-center" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']" required>
																			<!--begin::Col-->
																			<div class="col">
																				<!--begin::Option-->
																				<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
																					<!--begin::Radio-->
																					<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																						<input class="form-check-input" type="checkbox" name="status" value="active">
																					</span>
																					<!--end::Radio-->
																					<!--begin::Info-->
																					<span class="ms-5">
																						<label class="fs-6 fw-bolder text-primary">JNE OK</label>
																					</span>
																					<!--end::Info-->
																				</label>
																				<!--end::Option-->
																			</div>
																			<!--end::Col-->
																			<!--begin::Col-->
																			<div class="col">
																				<!--begin::Option-->
																				<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
																					<!--begin::Radio-->
																					<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																						<input class="form-check-input" type="checkbox" name="status" value="inactive">
																					</span>
																					<!--end::Radio-->
																					<!--begin::Info-->
																					<span class="ms-5">
																						<label class="fs-6 fw-bolder text-primary">JNEREG</label>
																					</span>
																					<!--end::Info-->
																				</label>
																				<!--end::Option-->
																			</div>
																			<!--end::Col-->
																			<!--begin::Col-->
																			<div class="col">
																				<!--begin::Option-->
																				<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
																					<!--begin::Radio-->
																					<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																						<input class="form-check-input" type="checkbox" name="status" value="inactive">
																					</span>
																					<!--end::Radio-->
																					<!--begin::Info-->
																					<span class="ms-5">
																						<label class="fs-6 fw-bolder text-primary">Ninja</label>
																					</span>
																					<!--end::Info-->
																				</label>
																				<!--end::Option-->
																			</div>
																			<!--end::Col-->
																			<!--begin::Col-->
																			<div class="col">
																				<!--begin::Option-->
																				<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
																					<!--begin::Radio-->
																					<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																						<input class="form-check-input" type="checkbox" name="status" value="inactive">
																					</span>
																					<!--end::Radio-->
																					<!--begin::Info-->
																					<span class="ms-5">
																						<label class="fs-6 fw-bolder text-primary">SiCepat</label>
																					</span>
																					<!--end::Info-->
																				</label>
																				<!--end::Option-->
																			</div>
																			<!--end::Col-->
																			<!--begin::Col-->
																			<div class="col">
																				<!--begin::Option-->
																				<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
																					<!--begin::Radio-->
																					<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																						<input class="form-check-input" type="checkbox" name="status" value="inactive">
																					</span>
																					<!--end::Radio-->
																					<!--begin::Info-->
																					<span class="ms-5">
																						<label class="fs-6 fw-bolder text-primary">POS</label>
																					</span>
																					<!--end::Info-->
																				</label>
																				<!--end::Option-->
																			</div>
																			<!--end::Col-->
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																		<button type="submit" class="btn btn-primary">Add Courier</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-3">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="kt_customers_table">
														<!--begin::Table head-->
														<thead>
															<tr class="fw-bolder text-muted">
																<th class="min-w-25px">No</th>
																<th class="min-w-125px">Courier</th>
																<th class="min-w-100px text-end">Actions</th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
															<?php $n=0 ?>
															@foreach ($couriers as $courier)
																<tr>
																	<td>
																		<label class="text-dark fw-medium-block fs-6">{{ $n+=1 }}</label>
																	</td>
																	<td>
																		<div class="d-flex align-items-center">
																			<div class="symbol symbol-45px me-5 image-size">
																				<img src="{{ $courier->image ?? '/assets/img/default.jpg' }}" width="100px" alt="" />
																			</div>
																			<div class="d-flex justify-content-start flex-column">
																				<label class="text-dark fw-medium text-hover-primary fs-6">{{ $courier->name }}</label>
																			</div>
																		</div>
																	</td>
																	<td>
																		<div class="d-flex justify-content-end flex-shrink-0">
																			<a href="{{ route('courier.edit', ['courier' => $courier->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																				<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																				<span class="svg-icon svg-icon-3">
																					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																						<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="black" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																						<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																			</a>
																			<form action="{{ route('courier.destroy', ['courier' => $courier->id]) }}" method="POST">
																				@csrf
																				@method('DELETE')
																				<button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																					<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																					<span class="svg-icon svg-icon-3">
																						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																							<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
																							<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
																							<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
																						</svg>
																					</span>
																					<!--end::Svg Icon-->
																				</button>
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
												<!--end::Table container-->
											</div>
											<!--begin::Body-->
										</div>
										<!--end::Tables Widget 9-->
									</div>
										