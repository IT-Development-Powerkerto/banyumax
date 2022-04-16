
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label text-white fw-bolder fs-3 mb-1">Staff</span>
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
											<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
                                                @if (auth()->user()->paket_id == 1 && $users->where('admin_id', auth()->user()->id)->count() > 51)

                                                @else
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#add-user" class="btn btn-sm btn-light btn-active-primary">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Add Staff</a>
                                                @endif
												<form action="#" method="GET" class="d-flex ms-2">
													<input class="form-control mt-0" type="text" placeholder="Search" name="search" id="searchstaff" style="height: 33px;">
													<button class="btn mt-n2" type="submit" style="height: 30px;"><i class="fas fa-search fas-7x"></i></button>
												</form>
											</div>
											<div class="modal fade" tabindex="-1" id="add-user">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Add Staff</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
																@csrf
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputFullname" class="col-form-label">Fullname</label>
																	</div>
																	<div class="col-10">
																		<input type="text" value="{{ old('name') }}" name="name" id="inputFullname" class="form-control" aria-describedby="fullnameHelpInline" required>
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputEmail" class="col-form-label">Email</label>
																	</div>
																	<div class="col-10">
																		<input type="email" value="{{ old('email') }}" name="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelpInline" required>
																	</div>
																	@error('email')
																		<div class="col-2">
																			<div></div>
																		</div>
																		<div class="col-10 ">
																			<div class="form-control alert alert-danger">{{ $message }}</div>
																		</div>
																	@enderror
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputPhone" class="col-form-label">Phone</label>
																	</div>
																	<div class="col-10">
																		<input type="text" value="{{ old('phone') }}" name="phone" id="inputPhone" class="form-control @error('phone') is-invalid @enderror" aria-describedby="phoneHelpInline" required>
																	</div>
																	@error('phone')
																		<div class="col-2">
																			<div></div>
																		</div>
																		<div class="col-10 ">
																			<div class="form-control alert alert-danger">{{ $message }}</div>
																		</div>
																	@enderror
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputUsername" class="col-form-label">Username</label>
																	</div>
																	<div class="col-10">
																		<input type="text" value="{{ old('username') }}" name="username" id="inputUsername" class="form-control @error('username') is-invalid @enderror" aria-describedby="usernameHelpInline" required>
																	</div>
																	@error('username')
																		<div class="col-2">
																			<div></div>
																		</div>
																		<div class="col-10 ">
																			<div class="form-control alert alert-danger">{{ $message }}</div>
																		</div>
																	@enderror
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputPassword6" class="col-form-label">Password</label>
																	</div>
																	<div class="col-10">
																		<input type="password" name="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" required>
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputRole" class="col-form-label">Role</label>
																	</div>
																	<div class="dropdown col-10">
																		<select name="role_id" id="role_id" class="form-control">
                                                                            <option hidden>Select Role</option>
																			@foreach ($role as $role)
                                                                                <option value={{$role->id}}>{{$role->name}}</option>
                                                                                {{-- @if (auth()->user()->admin_id != 1)
                                                                                    <option value={{$role->id == 1}}>{{$role->name}}</option>
                                                                                @else
                                                                                    <option value={{$role->id}}>{{$role->name}}</option>
                                                                                @endif --}}
																			@endforeach
																		</select>
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputimage" class="col-form-label">Image</label>
																	</div>
																	<div class="dropdown col-10">
																		<div class="mb-3">
																			<input class="form-control" type="file" id="inputimage" name="image" id="formFileMultiple" multiple id>
																		</div>
																	</div>
																</div>
																{{ csrf_field() }}
																<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add Staff">
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
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="staff">
													<!--begin::Table head-->
													<thead>
														<tr class="fw-bolder text-muted">
															<th class="">Name</th>
															<th class="">Point</th>
															<th class="">Division</th>
															<th class="">Status</th>
                                                            <th class="text-end">Actions</th>
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
																		<a href="{{ route('users.edit',['user' => $user->id]) }}" class="text-dark fw-medium text-hover-primary fs-6">{{$user->name}}</a>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<h1 class="badge badge-light-info">50 Points</h1>
																</div>
															</td>
															<td>
																<label class="text-dark fw-medium d-block fs-6">{{$user->role->name}}</label>
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
                                                                    <form action="{{ route('users.edit',['user' => $user->id]) }}" method="GET">
                                                                        @csrf
																		<div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" title="Click to edit user" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></button>
																			</div>
																		</div>
                                                                    </form>
                                                                    <form action="{{ route('dashboard.destroy', ['dashboard'=>$user->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
																		<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" class="btn btn-danger btn-icon" title="Click to delete" onclick="return confirm('Are u sure ?')"><i class="la la-trash"></i></button>
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
