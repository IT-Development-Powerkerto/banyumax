<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Edit</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="icon" href="../img/favicon.png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<!-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
		<link href="{{ URL::asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!-- <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						@include('layout/header/_base-JA-ADV')
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Navbar-->
							<div class="card mb-5 mb-xl-10">
								<div class="card-body pt-9 pb-0">
									<!--begin::Details-->
									<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
										<!--begin: Pic-->
										<div class="me-7 mb-4">
											<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
												@if(is_null($user->image))
												<img src="{{ url('') }}/assets/img/default.jpg" alt="" />
												@else
												<img src="{{ url('') }}/{{ $user->image }}" alt="image" />
												@endif
												<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
											</div>
										</div>
										<!--end::Pic-->
										<!--begin::Info-->
										<div class="flex-grow-1">
											<!--begin::Title-->
											<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
												<!--begin::User-->
												<div class="d-flex flex-column">
													<!--begin::Name-->
													<div class="d-flex align-items-center mb-2">
														<label class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ $user->name }}</label>
													</div>
													<!--end::Name-->
													<!--begin::Info-->
													<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
														<label class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
														<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
														<span class="svg-icon svg-icon-4 me-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
																<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->{{ $user->role->name}}</label>
                                                        <label href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
														<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
														<span class="svg-icon svg-icon-4 me-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
																<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->{{ $user->email }}</label>
													</div>
													<!--end::Info-->
												</div>
												<!--end::User-->
												<!--begin::Actions-->
												<div class="d-flex my-2">
													<a href="#" class="btn btn-light me-3" data-bs-toggle="modal" data-bs-target="#changepwd">Change Password</a>
													<a href="#" class="btn btn-primary me-3" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">Send Message</a>
												</div>
												{{-- Begin-Modal Change Password --}}
												<div class="modal fade" tabindex="-1" id="changepwd">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Change Password</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<form action="{{ route('changePassword') }}" method="POST">
																	@method('PATCH')
																	@csrf
																	<div class="row align-items-center col-12 pb-5">
																		<div class="col-4">
																			<label for="inputPassword6" class="col-form-label">Current Password</label>
																		</div>
																		<div class="col-8">
																			<div class="input-group">
																				<input type="password" name="cpassword" id="current" class="form-control" aria-describedby="passwordHelpInline" required>
																				<span class="input-group-text" id="basic-addon1" onclick="currentPwd()"><i class="las la-eye"></i></span>
																			</div>
																		</div>
																	</div>
																	<div class="row align-items-center col-12 pb-5">
																		<div class="col-4">
																			<label for="inputPassword6" class="col-form-label">New Password</label>
																		</div>
																		<div class="col-8">
																			<div class="input-group">
																				<input type="password" name="password" id="new" class="form-control" aria-describedby="passwordHelpInline" required>
																				<span class="input-group-text" id="basic-addon1" onclick="newpwd()"><i class="las la-eye"></i></span>
																			</div>
																		</div>
																	</div>

																	{{ csrf_field() }}
																	<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Change Password">
																</form>
															</div>
														</div>
													</div>
												</div>
												{{-- End-Modal Change Password --}}
												<!--end::Actions-->
											</div>
											<!--end::Title-->
											<!--begin::Stats-->
											<div class="d-flex flex-wrap flex-stack">
												<!--begin::Wrapper-->
												<div class="d-flex flex-column flex-grow-1 pe-8">
													<!--begin::Stats-->
													<div class="d-flex flex-wrap">
														<!--begin::Stat-->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<!--begin::Number-->
															<div class="d-flex align-items-center">
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
																<span class="svg-icon svg-icon-3 svg-icon-success me-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
																		<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="2600">0</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-bold fs-6 text-gray-400">Points</div>
															<!--end::Label-->
														</div>
														<!--end::Stat-->
                                                        <!--begin::Stat-->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<!--begin::Number-->
															<div class="d-flex align-items-center">
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
																<span class="svg-icon svg-icon-3 svg-icon-danger me-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
																		<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="100">0</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-bold fs-6 text-gray-400">Minus</div>
															<!--end::Label-->
														</div>
														<!--end::Stat-->
                                                        <!--begin::Stat-->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<!--begin::Number-->
															<div class="d-flex align-items-center">
																<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
																		<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
																		<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
																		<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
																	</g>
																</svg><!--end::Svg Icon--></span>
																<!--end::Svg Icon-->
																<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="2500">0</div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-bold fs-6 text-gray-400">Equal</div>
															<!--end::Label-->
														</div>
														<!--end::Stat-->
													</div>
													<!--end::Stats-->
												</div>
												<!--end::Wrapper-->
												<!--begin::Progress-->
												<div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
													<div class="d-flex justify-content-between w-100 mt-auto mb-2">
														<span class="fw-bold fs-6 text-gray-400">Points</span>
														<span class="fw-bolder fs-6">50%</span>
													</div>
													<div class="h-5px mx-3 w-100 bg-light mb-3">
														<div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<!--end::Progress-->
											</div>
											<!--end::Stats-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Details-->
								</div>
							</div>
							<!--end::Navbar-->
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0 mt-n3">Edit Profile</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<form action="{{ route('users.update',['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PATCH')
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputFullname" class="col-form-label">Fullname</label>
											</div>
											<div class="col-10">
												<input type="text" name="name" value="{{ old('name') ?? $user->name }}" id="inputFullname" class="form-control" aria-describedby="fullnameHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputnickname" class="col-form-label">Nickname</label>
											</div>
											<div class="col-10">
												<input type="text" name="nickname" value="{{ old('nickname') ?? $user->nickname }}" id="inputnickname" class="form-control" aria-describedby="nicknameHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputEmail" class="col-form-label">Email</label>
											</div>
											<div class="col-10">
												<input type="email" name="email" value="{{ old('email') ?? $user->email }}" id="inputEmail" class="form-control" aria-describedby="emailHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputPhone" class="col-form-label">Phone</label>
											</div>
											<div class="col-10">
												<input type="text" name="phone" value="{{ old('phone') ?? $user->phone }}" id="inputPhone" class="form-control" aria-describedby="phoneHelpInline">
											</div>
										</div>
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputUsername" class="col-form-label">Username</label>
											</div>
											<div class="col-10">
												<input type="text" name="username" value="{{ old('username') ?? $user->username }}" id="inputUsername" class="form-control" aria-describedby="usernameHelpInline">
											</div>
										</div>
										{{-- @can('change-role') --}}


										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputRole" class="col-form-label">Role</label>
											</div>
											<div class="dropdown col-10">
												@if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
													<select name="role_id" id="role_id1" class="form-control">
														<option selected value="{{ $user->role_id }}" hidden>{{$user->role->name}}</option>
														@if (auth()->user()->admin_id != 1)
															@foreach ($roles->skip(1) as $role)
                                                                <option value="{{$role->id}}">{{$role->name}}</option>
															@endforeach
														@else
															<option value={{$role->id}}>{{$role->name}}</option>
														@endif
													</select>
												@else
													<label class="form-control">{{$user->role->name}}</label>
													{{-- <input class="form-control" type="text" value="{{ $user->role_id }}" hidden> --}}
												@endif
											</div>
										</div>
										{{-- @endcan --}}
										<div class="row align-items-center col-12 pb-5">
											<div class="col-2">
												<label for="inputimage" class="col-form-label">Image</label>
											</div>

											<div class="dropdown col-10">
												<div class="mb-3">
													<input class="form-control" value="{{ old('image') ?? $user->image }}" type="file" id="inputimage" name="image" id="formFileMultiple" multiple id>
												</div>
											</div>
										</div>
										{{ csrf_field() }}
										<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Edit">
									</form>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
						</div>
						<!--end::Wrapper-->
					</div>
				@include('layout/_footer')
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../assets/plugins/global/plugins.bundle.js"></script>
		<script src="../assets/js/scripts.bundle.js"></script>
		<script>
			var avatar1 = new KTImageInput('kt_image_1');
		</script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function() {
				$('#role_id1').on('change', function() {
					var roleId = $(this).val();
					if(roleId) {
						$.ajax({
							url: '/getRole/'+roleId,
							type: "GET",
							data : {"_token":"{{ csrf_token() }}"},
							dataType: "json",
							//success:function(data)
							// {
							//     if(data){
							//         $('#course').empty();
							//         $('#course').append('<option hidden>Choose Course</option>');
							//         $.each(data, function(key, course){
							//             $('select[name="course"]').append('<option value="'+ key +'">' + course.name+ '</option>');
							//         });
							//     }else{
							//         $('#course').empty();
							//     }
							// }
						});
					}//else{
					//     $('#course').empty();
				// }
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$('#role_id2').on('change', function() {
					var roleId = $(this).val();
					if(roleId) {
						$.ajax({
							url: '/getRole/'+roleId,
							type: "GET",
							data : {"_token":"{{ csrf_token() }}"},
							dataType: "json",
							//success:function(data)
							// {
							//     if(data){
							//         $('#course').empty();
							//         $('#course').append('<option hidden>Choose Course</option>');
							//         $.each(data, function(key, course){
							//             $('select[name="course"]').append('<option value="'+ key +'">' + course.name+ '</option>');
							//         });
							//     }else{
							//         $('#course').empty();
							//     }
							// }
						});
					}//else{
					//     $('#course').empty();
				// }
				});
			});
		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
