
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mt-n2 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="text-white card-label fw-bolder fs-3 mb-1">Announcements</span>
												<span class="text-white mt-1 fw-bold fs-7">
                                                    <script>
                                                        var bilangan = {{$announcements->count()}};

                                                        var	number_string = bilangan.toString(),
                                                            sisa 	= number_string.length % 3,
                                                            rupiah 	= number_string.substr(0, sisa),
                                                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                        if (ribuan) {
                                                            separator = sisa ? '.' : '';
                                                            rupiah += separator + ribuan.join('.');
                                                        }

                                                        document.write(rupiah);
                                                    </script> Announcements
                                                </span>
											</h3>
											<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a Announcement">
												<a href="#" data-bs-toggle="modal" data-bs-target="#add-announcement" class="btn btn-sm btn-light btn-active-primary text-hover-white mt-n3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends" style="color: #00509d;">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3">
													<i class="las la-plus" style="color: #00509d;"></i>
												</span>
												<!--end::Svg Icon-->Create Announcement</a>
											</div>
											<div class="modal fade" tabindex="-1" id="add-announcement">
												<div class="modal-dialog">
													<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Create Announcement</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
													<form action="{{ route('announcements.store') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
														<div class="row align-items-center col-12 pb-5">
															<div class="col-4">
																<label for="inputRole" class="col-form-label">Icon</label>
															</div>
															<div class="dropdown col-8">
																<select name="icon_id" id="icon_id" class="form-control">
                                                                    @foreach ($icon as $icon)
                                                                    <option value={{$icon->id}}>{{$icon->fa_name}}</option>
                                                                    @endforeach
																</select>
															</div>
														</div>
														<div class="row align-items-center col-12 pb-5">
															<div class="col-4">
																<label for="inputannouncement" class="col-form-label">Announcement</label>
															</div>
															<div class="col-8">
																<textarea type="text" name="announcement" id="inputannouncement" class="form-control" aria-describedby="announcementHelpInline"></textarea>
															</div>
														</div>
                                                        {{ csrf_field() }}
													    <input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add Announcement">
													</form>
													</div>
													</div>
												</div>
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
														<tr class="fw-medium text-muted">
															<th class="min-w-100px">Created At</th>
															<th class="min-w-100px">Icon</th>
															<th class="min-w-140px">Announcement</th>
															<th class="min-w-100px text-end">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($announcements->reverse() as $announcement)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<a href="#" class="text-dark fw-medium text-hover-primary fs-6">{{$announcement->created_at}}</a>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="text-dark fw-medium text-hover-primary fs-6">{{$announcement->icon->fa_name}}</h1>
																</div>
															</td>
															<td>
																<a href="#" class="text-dark fw-medium text-hover-primary d-block fs-6">{{$announcement->announcement}}</a>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="{{ route('announcements.destroy', ['announcement'=>$announcement->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
																	    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" class="btn btn-danger btn-icon" onclick="return confirm('Jadi Delete Kah ?')"><i class="la la-trash"></i></button>
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
