
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
													<span class="card-label fw-bolder fs-3 mb-1">Warehouse</span>
													<span class="text-muted mt-1 fw-bold fs-7">{{ $warehouses->count() }}</span>
												</h3>
												<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
													<button type="button" class="btn btn-sm btn-light btn-active-primary me-2" data-bs-toggle="modal" data-bs-target="#addWarehouse">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
													<span class="svg-icon svg-icon-3">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
															<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->Add Warehouse</button>

													<!-- Modal -->
													<div class="modal fade" id="addWarehouse" tabindex="-1" aria-labelledby="addWarehouse" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Add Warehouse</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	<form action="{{ route('warehouse.store') }}" method="POST" enctype="multipart/form-data">
																		@csrf
																		<!--begin::Input group-->
																		<div class="d-flex flex-column mb-1 fv-row">
																			<!--begin::Label-->
																			<label class="required fs-6 fw-bold form-label mb-2">Image</label>
																			<!--end::Label-->
																			<div class="col-lg-5 col-xl-6">
																				{{-- <!--begin::Label-->
																				<label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
																				<!--end::Label--> --}}
																				<!--begin::Col-->
																				<div class="col-lg-8">
																					<!--begin::Image input-->
																					<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/mediaTwo/ImagePhoto.png)">
																						<!--begin::Preview existing avatar-->
																						<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/mediaTwo/ImagePhoto.png)"></div>
																						<!--end::Preview existing avatar-->
																						<!--begin::Label-->
																						<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																							<i class="bi bi-pencil-fill fs-7"></i>
																							<!--begin::Inputs-->
																							<input type="file" class="form-control-file" id="image" name="image" accept=".png, .jpg, .jpeg" >
																							<input type="hidden" name="avatar_remove" />
																							@error('image')
																							<div class="text-danger">{{ $message }}</div>
																							@enderror
																							{{--  <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																							<input type="hidden" name="avatar_remove" />  --}}
																							<!--end::Inputs-->
																						</label>
																						<!--end::Label-->
																						<!--begin::Cancel-->
																						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																							<i class="bi bi-x fs-2"></i>
																						</span>
																						<!--end::Cancel-->
																						<!--begin::Remove-->
																						<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																							<i class="bi bi-x fs-2"></i>
																						</span>
																						<!--end::Remove-->
																					</div>
																					<!--end::Image input-->
																				</div>
																				<!--end::Col-->
																			</div>
																		</div>
																		<!--end::Input group-->
																		<div class="mb-3">
																			<label for="name" class="form-label">Warehouse Name</label>
																			<input type="text" value="" class="form-control" id="name" name="name" required>
																		</div>
																		<div class="mb-3">
																			<label for="name" class="form-label">Warehouse Initials</label>
																			<input type="text" value="" class="form-control" id="initials" name="initials">
																		</div>
																		<div class="mb-3">
																			<label for="email" class="form-label">Email</label>
																			<input type="email" value="" class="form-control" id="email" name="email">
																		</div>
																		<div class="mb-3">
																			<label for="phone" class="form-label">Phone</label>
																			<input type="text" value="" class="form-control" id="phone" name="phone">
																		</div>
																		<div class="mb-3">
																			<label for="address" class="form-label">Address</label>
																			<textarea type="text" value="" class="form-control" id="address" name="address" required></textarea>
																		</div>
																		<div class="mb-3">
																			<label for="province" class="form-label">Province</label>
																			<select name="province" id="province" class="form-control" required>
																				<option value="" hidden>Province</option>
																				@foreach ($provinces as $province)
																				<option value="{{ $province['province_id'].'_'.$province['province'] }}">{{ $province['province'] }}</option>
																				@endforeach
																			</select>
																		</div>
																		<div class="mb-3">
																			<label for="city" class="form-label">City</label>
																			<select class="form-control" id="city" name="city" required>
																				<option value="" hidden>City</option>
																			</select>
																		</div>
																		<div class="mb-3">
																			<label for="subdistrict" class="form-label">Subdistrict</label>
																			<select class="form-control" id="subdistrict" name="subdistrict" required>
																				<option value="" hidden>Subdistrict</option>
																			</select>
																		</div>
																		<div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9 d-flex justify-content-center" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']" required>
																			<!--begin::Col-->
																			<div class="col">
																				<!--begin::Option-->
																				<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
																					<!--begin::Radio-->
																					<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																						<input class="form-check-input" type="radio" name="status" value="active" required>
																					</span>
																					<!--end::Radio-->
																					<!--begin::Info-->
																					<span class="ms-5">
																						<label class="fs-4 fw-bolder text-success">Active</label>
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
																						<input class="form-check-input" type="radio" name="status" value="inactive" required>
																					</span>
																					<!--end::Radio-->
																					<!--begin::Info-->
																					<span class="ms-5">
																						<label class="fs-4 fw-bolder text-danger">Inactive</label>
																					</span>
																					<!--end::Info-->
																				</label>
																				<!--end::Option-->
																			</div>
																			<!--end::Col-->
																		</div>
																		<button type="button" class="btn btn-secondary mt-5 float-end" data-bs-dismiss="modal">Close</button>
																		<input type="submit" class="btn btn-primary mt-5 float-end me-5" value="Save">
																	</form>
																</div>
																{{--  <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																	<input type="submit" class="btn btn-primary" value="Save">

																</div>  --}}
															</div>
														</div>
													</div>

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
														<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" style="height: 33px;" placeholder="Search Users" />
													</div>
													<!--end::Search-->
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
																<th class="min-w-125px">Warehouse</th>
																<th class="min-w-125px">Email</th>
																<th class="min-w-100px">Phone</th>
																<th class="min-w-200px">Address</th>
																<th class="min-w-100px">Status</th>
																<th class="min-w-100px text-end">Actions</th>
															</tr>
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>
															<?php $n=0; ?>
															{{--  {{ dd($warehouses) }}  --}}
															@foreach ($warehouses as $warehouse)

															<tr>
																<td>
																	<label class="text-dark fw-medium-block fs-6">{{ $n+=1 }}</label>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="symbol symbol-45px me-5 image-size">
																			<img src="{{ $warehouse->image ?? '/assets/img/default.jpg' }}" width="100px" alt="" />
																		</div>
																		<div class="d-flex justify-content-start flex-column">
																			<label class="text-dark fw-medium text-hover-primary fs-6">{{ $warehouse->name }}</label>
																		</div>
																	</div>
																</td>
																<td>
																	<label class="text-dark fw-medium-block fs-6">{{ $warehouse->email ?? '' }}</label>
																</td>
																<td>
																	<label class="text-dark fw-medium-block fs-6">{{ $warehouse->phone ?? '' }}</label>
																</td>
																<td>
																	<label class="text-dark fw-medium-block fs-6">{{ $warehouse->address ?? '' }}</label>
																</td>
																<td>
																	@if($warehouse->status == 'active')
																	<label class="text-dark badge badge-light-success fw-medium-block fs-7">Active</label>
																	@else
																	<label class="text-dark badge badge-light-danger fw-medium-block fs-7">InActive</label>
																	@endif
																</td>
																<td>
																	<div class="d-flex justify-content-end flex-shrink-0">
																		<a href="{{ route('warehouse.edit', ['warehouse' => $warehouse->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																			<span class="svg-icon svg-icon-3">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="black" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																					<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</a>
																		<form action="{{ route('warehouse.destroy', ['warehouse' => $warehouse->id]) }}" method="post">
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
