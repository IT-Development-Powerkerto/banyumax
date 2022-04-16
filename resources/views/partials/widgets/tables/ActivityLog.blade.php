
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label fw-bolder fs-3 mb-1">Activity Logs</span>
												<span class="text-muted mt-1 fw-bold fs-7">
                                                    <script>
                                                        var bilangan = {{$reimbursement->count()}};

                                                        var	number_string = bilangan.toString(),
                                                            sisa 	= number_string.length % 3,
                                                            rupiah 	= number_string.substr(0, sisa),
                                                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                        if (ribuan) {
                                                            separator = sisa ? '.' : '';
                                                            rupiah += separator + ribuan.join('.');
                                                        }

                                                        document.write(rupiah);
                                                    </script> Activity Logs
                                                </span>
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
															<th class="">Timestamp</th>
															<th class="">CS Name</th>
															<th class="">Reason</th>
															<th class="">Nominal</th>
															<th class="">Submission Status</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($reimbursement as $reimbursement)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<label class="text-dark fw-medium text-hover-primary fs-6">{{$reimbursement->created_at}} WIB</label>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<label class="text-dark fw-medium text-hover-primary fs-6">{{$reimbursement->user->name}}</label>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<label class="text-dark fw-medium text-hover-primary fs-6">{{$reimbursement->reason}}</label>
																</div>
															</td>
															<td>
																<label class="text-dark fw-medium text-hover-primary d-block fs-6">Rp.
                                                                    <script>
                                                                        var bilangan = {{$reimbursement->nominal}};

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
                                                                </label>
															</td>
															<td class="text-end">
																<div class="d-flex align-items-center">
                                                                    @if ($reimbursement->status == 1)
                                                                        <label class="badge badge-light-success">Approved</label>
                                                                    @elseif ($reimbursement->status == 0)
                                                                        <label class="badge badge-light-danger">Reject</label>
                                                                    @else
                                                                        <label class="badge badge-light-info">Wait</label>
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
