
									<!--begin::Tables Widget 9-->
									<div class="card card-xl-stretch mb-5 mb-xl-8 p-0 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3" >
												<span class="card-label fw-bolder fs-3 mb-1 text-white">Staff</span>
												<span class="text-white mt-1 fw-bold fs-7">
                                                    <script>
                                                        var bilangan = {{$users->count()}};

                                                        var	number_string = bilangan.toString(),
                                                            sisa 	= number_string.length % 3,
                                                            rupiah 	= number_string.substr(0, sisa),
                                                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                        if (ribuan) {
                                                            separator = sisa ? '.' : '';
                                                            rupiah += separator + ribuan.join('.');
                                                        }

                                                        document.write(rupiah);
                                                    </script> Staff
                                                </span>
											</h3>
											<div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to search a user">
												<form action="" method="GET" class="d-flex ms-2">
													<input class="form-control mt-0" type="text" placeholder="Search" name="search" id="search" style="height: 33px;">
													<button class="btn mt-n2" type="submit" style="height: 30px;"><i class="fas fa-search fas-7x"></i></button>
												</form>
											</div>

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
															<th class="min-w-100px">Name</th>
															<th class="min-w-100px">Point</th>
															<th class="min-w-140px">Division</th>
															<th class="min-w-120px">Status</th>
															<th class="min-w-120px text-end">Action</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($users as $user)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="symbol symbol-45px me-5 image-size">
																		@if(is_null($user->image))
																		<img src="/assets/img/default.jpg" width="100px" alt="" />
																		@else

																		<img src="{{$user->image}}" width="100px" alt="" />
																		@endif
																	</div>
																	<div class="d-flex justify-content-start flex-column">
																		<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$user->name}}</a>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-bolder text-hover-primary fs-6">50 Points </h1>
																</div>
															</td>
															<td>
																<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$user->role->name}}</a>
															</td>
															<td class="text-end">
																<div class="d-flex flex-column w-100 me-2">
																	<div class="d-flex flex-stack">
                                                                        @if ($user->status == 1)
                                                                            <span class="badge badge-light-danger">Work</span>
                                                                        @else
                                                                            <span class="badge badge-light-success">Idle</span>
                                                                        @endif
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="{{ route('viewProfile',['user' => $user->id]) }}" method="GET">
                                                                        @csrf
																		<div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></button>
																			</div>
																		</div>
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
