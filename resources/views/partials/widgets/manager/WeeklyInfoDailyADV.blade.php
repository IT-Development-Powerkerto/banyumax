
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 shadow-sm border">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5" style="background-color: #00509d;">
											<h3 class="card-title align-items-start mt-n3 flex-column">
												<span class="card-label text-white fw-bolder fs-3 mb-1">Weekly Info ADV</span>
												<span class="text-white mt-1 fw-bold fs-7">{{$adv->count()}} Advertise</span>
											</h3>
											<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-sm btn-outline border-white text-white text-hover-primary btn-active-secondary me-2" title="Click For Export">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
													<span class="svg-icon svg-icon-3">
														<i class="las la-print text-white text-hover-primary" style="font-size: 18px"></i>
													</span>
													<!--end::Svg Icon-->Export</button>
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
															<th class="">No</th>
															<th class="">Name</th>
															<th class="">Week 1</th>
															<th class="">Week 2</th>
															<th class="">Week 3</th>
															<th class="">Week 4</th>
															<th class=" text-end">Omzet per Month</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php
                                                            $n=0;
                                                        ?>
                                                        @foreach ($adv as $adv)
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
																		<h1 class="text-dark fw-normal fs-6">{{$adv->name}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">Rp.
                                                                        <script>
                                                                            var bilangan = {{$omset1->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('total_price') - $omset1->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('product_promotion')}};

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
																	<h1 class="text-dark fw-normal fs-6">Rp.
                                                                        <script>
                                                                            var bilangan = {{$omset2->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('total_price') - $omset2->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('product_promotion')}};

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
																	<h1 class="text-dark fw-normal fs-6">Rp.
                                                                        <script>
                                                                            var bilangan = {{$omset3->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('total_price') - $omset3->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('product_promotion')}};

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
																	<h1 class="text-dark fw-normal fs-6 ">Rp.
                                                                        <script>
                                                                            var bilangan = {{$omset4->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('total_price') - $omset4->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('product_promotion')}};

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
																	<h1 class="text-info fw-bolder fs-6 ">Rp.
                                                                        <script>
                                                                            var bilangan = {{$omset_permonth->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('total_price') - $omset_permonth->where('admin_id', auth()->user()->admin_id)->where('adv_name', $adv->name)->sum('product_promotion')}};

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
