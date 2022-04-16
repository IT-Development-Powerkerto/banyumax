
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 shadow-sm border mt-6">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5" style="background-color: #00509d;">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label text-white fw-bolder fs-3 mb-1">Activity Logs</span>
												<span class="text-white mt-1 fw-bold fs-7">{{$budgeting->where('admin_id', auth()->user()->admin_id)->where('status', '!=', 2)->where('requirement', '>=', 1000000)->count()}} Activity</span>
											</h3>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body py-3 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
											<!--begin::Table container-->
											<div class="table-responsive">
												<!--begin::Table-->
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="staff">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-bolder text-muted">
															<th class="min-w-150px">Timestamp</th>
															<th class="min-w-150px">Name</th>
															<th class="min-w-150px">Division</th>
															<th class="min-w-150px">Reason</th>
															<th class="min-w-150px">Request</th>
															<th class="min-w-150px text-end">Submission Status</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($budgeting->where('status', '!=', 2)->where('requirement', '>=', 1000000) as $budgeting)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 href="#" class="text-dark fw-normal fs-6">{{$budgeting->updated_at}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$budgeting->user_name}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$budgeting->role->name}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$budgeting->reason}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Rp.
                                                                        <script>
                                                                            var bilangan = {{$budgeting->requirement}};

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
															<td>
																<div class="d-flex align-items-center justify-content-end">
																	@if ($budgeting->status == 1)
                                                                        <h1 class="text-dark fw-normal fs-6 badge badge-light-success">Approve</h1>
                                                                    @else
                                                                        <h1 class="text-dark fw-normal fs-6 badge badge-light-danger">Rejected</h1>
                                                                    @endif
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
