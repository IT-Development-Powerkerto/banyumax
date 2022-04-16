
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 shadow-sm border">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5" style="background-color: #00509d;">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label text-white fw-bolder fs-3 mb-1">Realization ADV</span>
												<span class="text-white mt-1 fw-bold fs-7">{{$budgeting_realization_adv->where('admin_id', auth()->user()->admin_id)->count()}} Proofment</span>
											</h3>
											<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-sm btn-outline border-white text-white text-hover-primary btn-active-secondary me-2" title="Click For Export">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
													<span class="svg-icon svg-icon-3">
														<i class="las la-print text-white text-hover-primary" style="font-size: 18px"></i>
													</span>
													<!--end::Svg Icon-->Export</button>
												<form action="/ceo" method="GET" class="d-flex">
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
															<th class="min-w-150px">Item</th>
															<th class="min-w-150px">Nominal</th>
															<th class="min-w-150px">Description</th>
															<th class="min-w-150px text-end">Attachment</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php
                                                            $n=0;
                                                        ?>
                                                        @foreach ($budgeting_realization_adv->where('admin_id', auth()->user()->admin_id) as $budgeting_realization)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 class="text-dark fw-normal fs-6">{{$n+=1}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->user_name}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->item_name}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Rp.
                                                                        <script>
                                                                            var bilangan = {{$budgeting_realization->requirement}};

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
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->description}}</h1>
																</div>
															</td>
															<td class="d-flex align-items-center justify-content-end ">
																<a href="{{ route('download', $budgeting_realization->id) }}">
                                                                    <button type="button" class="btn btn-sm btn-light btn-active-primary" style="width: 120px; height: 40px">Download</button>
                                                                </a>
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
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 shadow-sm border">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5" style="background-color: #00509d;">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label text-white fw-bolder fs-3 mb-1">Realization nonADV</span>
												<span class="text-white mt-1 fw-bold fs-7">{{$budgeting_realization_nonadv->where('admin_id', auth()->user()->admin_id)->count()}} Proofment</span>
											</h3>
											<div class="card-toolbar  mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-sm btn-outline border-white text-white text-hover-primary btn-active-secondary me-2" title="Click For Export">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
													<span class="svg-icon svg-icon-3">
														<i class="las la-print text-white text-hover-primary" style="font-size: 18px"></i>
													</span>
													<!--end::Svg Icon-->Export</button>
												<form action="/dashboard" method="GET" class="d-flex">
												<form action="/adv" method="GET" class="d-flex">
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
															<th class="min-w-150px">Division</th>
															<th class="min-w-150px">Item</th>
															<th class="min-w-150px">Nominal</th>
															<th class="min-w-150px">Description</th>
															<th class="min-w-150px text-end">Attachment</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php
                                                            $n = 0;
                                                        ?>
                                                        @foreach ($budgeting_realization_nonadv->where('admin_id', auth()->user()->admin_id) as $budgeting_realization)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 class="text-dark fw-normal fs-6">{{$n+=1}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->role->name}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->item_name}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Rp.
                                                                        <script>
                                                                            var bilangan = {{$budgeting_realization->requirement}};

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
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$budgeting_realization->description}}</h1>
																</div>
															</td>
															<td class="d-flex align-items-center justify-content-end">
																<a href="{{ route('download', $budgeting_realization->id) }}">
                                                                    <button type="button" class="btn btn-sm btn-light btn-active-primary" style="width: 120px; height: 40px">Download</button>
                                                                </a>
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
