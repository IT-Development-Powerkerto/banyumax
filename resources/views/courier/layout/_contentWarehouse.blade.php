										
									<!--begin::Container-->
									<div id="kt_content_container" class="container-xxl" >				
										<!--begin::Tables Widget 9-->
										<div class="card card-xl-stretch mt-12 mb-5 mb-xl-8">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5 ">
												<h3 class="card-title align-items-start flex-column mt-n3">
													<span class="card-label fw-bolder fs-3 mb-1">Courier</span>
													<span class="text-muted mt-1 fw-bold fs-7">2</span>
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
													<!--end::Svg Icon-->Add Courier</button>

													<!-- Modal -->
													<div class="modal fade" id="addWarehouse" tabindex="-1" aria-labelledby="addWarehouse" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Add Courier</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	<form>
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
																			<label for="exampleInputCourier" class="form-label">Courier</label>
																			<input type="text" class="form-control" id="exampleInputCourier">
																		</div>
																	</form>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																	<button type="button" class="btn btn-primary">Add Courier</button>
																</div>
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
															<tr>
																<td>
																	<label class="text-dark fw-medium-block fs-6">1</label>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="symbol symbol-45px me-5 image-size">
																			<img src="/assets/img/default.jpg" width="100px" alt="" />
																		</div>
																		<div class="d-flex justify-content-start flex-column">
																			<label class="text-dark fw-medium text-hover-primary fs-6">JNE</label>
																		</div>
																	</div>
																</td>
																<td>
																	<div class="d-flex justify-content-end flex-shrink-0">
																		<a href="{{ route('editCR') }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																			<span class="svg-icon svg-icon-3">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="black" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																					<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</a>
																		<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																			<span class="svg-icon svg-icon-3">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
																					<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
																					<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</a>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<label class="text-dark fw-medium-block fs-6">2</label>
																</td>
																<td>
																	<div class="d-flex align-items-center">
																		<div class="symbol symbol-45px me-5 image-size">
																			<img src="/assets/img/default.jpg" width="100px" alt="" />
																		</div>
																		<div class="d-flex justify-content-start flex-column">
																			<label class="text-dark fw-medium text-hover-primary fs-6">Kosambi</label>
																		</div>
																	</div>
																</td>
																<td>
																	<div class="d-flex justify-content-end flex-shrink-0">
																		<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																			<span class="svg-icon svg-icon-3">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="black" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																					<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</a>
																		<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																			<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																			<span class="svg-icon svg-icon-3">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
																					<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
																					<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</a>
																	</div>
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
									</div>
										