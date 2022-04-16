
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8 shadow-sm border mt-6">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label fw-bolder fs-3 mb-1">ADV Activity Budgeting</span>
                                                @if (auth()->user()->role_id == 1)
                                                    <span class="text-muted mt-1 fw-bold fs-7">
                                                        <script>
                                                            var bilangan = {{$budgeting->where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->count()}};

                                                            var	number_string = bilangan.toString(),
                                                                sisa 	= number_string.length % 3,
                                                                rupiah 	= number_string.substr(0, sisa),
                                                                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                            if (ribuan) {
                                                                separator = sisa ? '.' : '';
                                                                rupiah += separator + ribuan.join('.');
                                                            }

                                                            document.write(rupiah);
                                                        </script> Activity
                                                    </span>
                                                @else
												    <span class="text-muted mt-1 fw-bold fs-7">
                                                        <script>
                                                            var bilangan = {{$budgeting->where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('user_id', auth()->user()->id)->count()}};

                                                            var	number_string = bilangan.toString(),
                                                                sisa 	= number_string.length % 3,
                                                                rupiah 	= number_string.substr(0, sisa),
                                                                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                            if (ribuan) {
                                                                separator = sisa ? '.' : '';
                                                                rupiah += separator + ribuan.join('.');
                                                            }

                                                            document.write(rupiah);
                                                        </script> Activity
                                                    </span>
                                                @endif
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
															<th class="min-w-225px">Date</th>
															<th class="min-w-225px">ADV Name</th>
															<th class="min-w-225px">Pengajuan</th>
                                                            <th class="min-w-225px">Target</th>
															<th class="min-w-225px text-end">Status</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 12)
                                                            @foreach ($budgeting->where('admin_id', auth()->user()->admin_id)->where('role_id', 4) as $budgeting)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <h1 href="#" class="text-dark fw-normal fs-6">{{$budgeting->created_at}}</h1>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <h1 href="#" class="text-dark fw-normal fs-6">{{$budgeting->user_name}}</h1>
                                                                        </div>
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
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-normal fs-6">Rp.
                                                                            <script>
                                                                                var bilangan = {{$budgeting->target}};

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
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-light-success">Accept</h1>
                                                                        @elseif ($budgeting->status == 0)
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-light-danger">Rejected</h1>
                                                                        @else
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-light-info">Wait</h1>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @else
                                                            @foreach ($budgeting->where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('user_id', auth()->user()->id) as $budgeting)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <h1 href="#" class="text-dark fw-normal fs-6">{{$budgeting->created_at}}</h1>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex justify-content-start flex-column">
                                                                            <h1 href="#" class="text-dark fw-normal fs-6">{{$budgeting->user_name}}</h1>
                                                                        </div>
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
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-normal fs-6">Rp.
                                                                            <script>
                                                                                var bilangan = {{$budgeting->target}};

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
                                                                        @elseif ($budgeting->status == 0)
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-light-danger">Rejected</h1>
                                                                        @else
                                                                            <h1 class="text-dark fw-normal fs-6 badge badge-light-info">Wait</h1>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        @endif
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
