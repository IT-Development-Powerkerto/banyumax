
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 shadow-sm border mt-6">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label fw-bolder fs-3 mb-1">List Promotion</span>
												<span class="text-muted mt-1 fw-bold fs-7">
                                                    <script>
                                                        var bilangan = {{$promotion->count()}};

                                                        var	number_string = bilangan.toString(),
                                                            sisa 	= number_string.length % 3,
                                                            rupiah 	= number_string.substr(0, sisa),
                                                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                        if (ribuan) {
                                                            separator = sisa ? '.' : '';
                                                            rupiah += separator + ribuan.join('.');
                                                        }

                                                        document.write(rupiah);
                                                    </script> Promotion
                                                </span>
											</h3>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body py-3 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
											<!--begin::Table container-->
											<div class="table-responsive">
												<!--begin::Table-->
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-bolder text-muted">
															<th class="min-w-150px">Creator</th>
															<th class="min-w-150px">Product</th>
															<th class="min-w-150px">Promotion Name</th>
															<th class="min-w-150px">Promotion Type</th>
															<th class="min-w-150px">Nominal Promotion</th>
                                                            <th class="min-w-150px text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($promotion as $promotion)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 href="#" class="text-dark fw-normal fs-6">{{$promotion->user->name}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 href="#" class="text-dark fw-normal fs-6">{{$promotion->product_name}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<h1 href="#" class="text-dark fw-normal fs-6">{{$promotion->promotion_name}}</h1>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6">{{$promotion->promotion_type}}</h1>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-normal fs-6 badge badget-light-dager">Rp.
                                                                        <script>
                                                                            var bilangan = {{$promotion->total_promotion}};

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
                                                                <div class="d-flex flex-row justify-content-end">
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
                                                                            <form action="{{ route('promotion.edit', ['promotion' => $promotion->id]) }}" method="GET">
                                                                                @csrf
                                                                                <button type="submit" class="btn btn-link ms-3">Edit</button>
                                                                            </form>
                                                                        </div>
                                                                        <!--end::Menu item-->
                                                                        <!--begin::Menu item-->
                                                                        <div class="menu-item px-3">
                                                                            <form action="{{ route('promotion.destroy', ['promotion'=>$promotion->id]) }}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="text-danger btn btn-link ms-3 mt-3" onclick="return confirm('Are u sure ?')">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                        <!--end::Menu item-->
                                                                    </div>
                                                                    <!--end::Menu-->
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
