
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 mt-5 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Admin</span>
												<span class="text-muted mt-1 fw-bold fs-7">
                                                    <script>
                                                        var bilangan = {{$user->count()}};

                                                        var	number_string = bilangan.toString(),
                                                            sisa 	= number_string.length % 3,
                                                            rupiah 	= number_string.substr(0, sisa),
                                                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                        if (ribuan) {
                                                            separator = sisa ? '.' : '';
                                                            rupiah += separator + ribuan.join('.');
                                                        }

                                                        document.write(rupiah);
                                                    </script> Admin
                                                </span>
											</h3>
											<form action="#" method="GET" class="d-flex ms-2">
												<input class="form-control mt-0" type="text" placeholder="Search" name="search" id="searchstaff" style="height: 33px;">
												<button class="btn mt-n2" type="submit" style="height: 30px;"><i class="fas fa-search fas-7x"></i></button>
											</form>
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
															<th class="">Admin Name</th>
															<th class="">Admin ID</th>
															<th class="">Email</th>
															<th class="">No Whatsapp</th>
															<th class="">Packet</th>
															<th class="">Expired Date</th>
															<th class="">Status</th>
                                                            <th class="text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($user as $user)
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
																		<a href="#" class="text-dark fw-medium text-hover-primary fs-6">{{$user->name}}</a>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<label class="text-dark fw-medium fs-6">adm-{{$user->admin_id}}</label>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<label class="text-dark fw-medium fs-6">{{$user->email}}</label>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<label class="text-dark fw-medium fs-6">{{$user->phone}}</label>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<label class="text-dark fw-medium fs-6">{{$user->paket->name}}</label>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<label class="text-dark fw-medium fs-6">{{$user->expired_at}}</label>
																</div>
															</td>
															<td class="text-end">
																<div class="d-flex flex-column w-100 me-2">
																	<div class="d-flex flex-stack">
                                                                        @if ($user->exp == 1)
                                                                            <span class="badge badge-light-success">Active</span>
                                                                        @else
                                                                            <span class="badge badge-light-danger">Non-Active</span>
                                                                        @endif
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    @if ($user->exp == 0)
                                                                        <form action="{{ route('updateAktive', ['user'=>$user->id]) }}" method="POST">
                                                                            @csrf
                                                                            <div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
                                                                                <div class="btn-group" role="group" aria-label="First group">
                                                                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-success  btn-icon"><i class="lar la-check-circle"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @else
                                                                        <form action="{{ route('updateNonAktive', ['user'=>$user->id]) }}" method="POST">
                                                                            @csrf
                                                                            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                                                                <div class="btn-group" role="group" aria-label="First group">
                                                                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-danger  btn-icon"><i class="las la-times"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    @endif
																	<form action="{{ route('superadmin.show',['superadmin' => $user->id]) }}" method="GET">
                                                                        @csrf
																		<div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-info  btn-icon"><i class="las la-info-circle"></i></button>
																			</div>
																		</div>
                                                                    </form>
                                                                    <form action="{{ route('superadmin.edit',['superadmin' => $user->id]) }}" method="GET">
                                                                        @csrf
																		<div class="btn-toolbar justify-content-between " role="toolbar" aria-label="Toolbar with button groups">
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
