
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 shadow-sm border mt-6">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5" style="background-color: #00509d;">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label text-white mt-n3 fw-bolder fs-3 mb-1">Activity Evaluation</span>
												<span class="text-white mt-1 fw-bold fs-7">{{$evaluation->where('admin_id', auth()->user()->admin_id)->count()}} Activity</span>
											</h3>
											<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">

												<form action="/manager" method="GET" class="d-flex">
													<div class="me-2 d-flex flex-row">
														<input class="form-control text-muted mt-0" name="date_filter"  id="date_filter" type="date" style="height: 33px;" onchange="submit()">
													</div>
												</form>
											</div>
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
															<th class="min-w-50px">No</th>
															<th class="min-w-150px">Name</th>
															<th class="min-w-150px">Product Name</th>
															<th class="min-w-150px">Date</th>
															<th class="min-w-100px">Time</th>
															<th class="min-w-150px">Resistance</th>
															<th class="min-w-150px">Solution</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php
                                                            $n = 0;
                                                        ?>
                                                        @foreach ($evaluation as $evaluation)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 href="#" class="text-dark fw-normal fs-6">{{$n+=1}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$evaluation->user->name}}</h1>
																</div>
															</td>
															<td>
                                                                <div class="d-flex align-items-center">
                                                                    @if ($evaluation->product_id == 0)
                                                                        <h1 class="text-dark fw-normal fs-6">All</h1>
                                                                    @else
                                                                        <h1 class="text-dark fw-normal fs-6">{{$evaluation->product->name}}</h1>
                                                                    @endif
                                                                </div>
                                                            </td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$evaluation->date}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$evaluation->time}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$evaluation->resistance}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$evaluation->solution}}</h1>
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
