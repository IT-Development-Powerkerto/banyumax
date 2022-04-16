
									<!--begin::Tables Widget 9-->
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
									<div class="card card-xxl-stretch mb-5 mb-xl-8 scroll scroll-pull shadow-sm" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label fw-bolder fs-3 mb-1">Customer Service</span>
												<span class="text-muted mt-1 fw-bold fs-7">{{ $cs_inputers->count() }} CS</span>
											</h3>
											<div class="card-toolbar mt-n3" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a Operator">
												<a href="" data-bs-toggle="modal" data-bs-target="#add-operator" class="btn btn-sm btn-light btn-active-primary me-2">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->Add Customer Service</a>
											</div>
											<div class="modal fade" tabindex="-1" id="add-operator">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Add Customer Service</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															{{--  <form action="{{route('addOperator.store')}}" method="POST">  --}}
															<form action="{{ route('inputer.addCS') }}" method="POST">
																@csrf
		
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputtitle" class="col-form-label">Customer Service</label>
																	</div>
																	<div class="col-10">
		
																		{{--  <input type="text" name="campaign_id" value="{{ $campaigns->id }}" required class="form-control">  --}}
																		<select class="form-control" name="cs_id">
																			<option>Select Customer Service</option>
																			@foreach ($cs as $cs)
																				<option value="{{ $cs->id }}">
																					{{ $cs->name }}
																				</option>
																			@endforeach
																		</select>
																	</div>
																</div>
		
																{{ csrf_field() }}
																<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add"/>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- Modal -->
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
															<th class="">Name CS</th>
															<th class="">Email</th>
															<th class="">Phone</th>
                                                            <th class="text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php $n=0; ?>
														@foreach ($cs_inputers as $cs_inputer)
														<tr>
															<td>
																<label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $n+=1 }}</label>
															</td>
															<td>
																<label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $cs_inputer->cs->name}}</label>
															</td>
															<td>
																<label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $cs_inputer->cs->email }}</label>
															</td>
															<td>
																<label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $cs_inputer->cs->phone }}</label>
															</td>
															<td>
																<form action="{{route('inputer.CS_destroy',['id' => $cs_inputer->id])}}" method="POST">
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
									<!--end::Tables Widget 9-->
