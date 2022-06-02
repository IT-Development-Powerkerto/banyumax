<!--begin::Mixed Widget 1-->
<div class="card card-xl-stretch mb-xl-8">
	<!--begin::Body-->
	<div class="card-body p-0">
		<!--begin::Header-->
		<div class="px-9 pt-7 card-rounded h-275px w-100 bg-danger">
			<!--begin::Heading-->
			<div class="d-flex flex-stack">
				<h3 class="m-0 text-white fw-bolder fs-3">Courier</h3>
			</div>
			<!--end::Heading-->
			<!--begin::Balance-->
			<div class="d-flex text-center flex-column text-white pt-8">
				<span class="fw-bold fs-7">Courier</span>
				<span class="fw-bolder fs-2x pt-1">
                    {{ number_format($courier->count(),0,',','.' ) }}
                </span>
			</div>
			<!--end::Balance-->
		</div>
		<!--end::Header-->
		<!--begin::Items-->
		<div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 233px; margin-top: -100px">
			<!--begin::Item-->
			<div class="d-flex align-items-center mb-6">
				<!--begin::Symbol-->
				<div class="symbol symbol-45px w-40px me-5">
					<span class="symbol-label bg-lighten">
						<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
						<span class="svg-icon svg-icon-1">
							<img src="assets/img/jne.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">JNE OK</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">
                            {{ number_format($courier->where('name', 'JNE OK')->count(),0,',','.' ) }}
                            {{-- <script>
                                var bilangan = {{$all_inputers->where('courier', 'JNE OK')->count()}};

                                var	number_string = bilangan.toString(),
                                    sisa 	= number_string.length % 3,
                                    rupiah 	= number_string.substr(0, sisa),
                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                if (ribuan) {
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                }

                                document.write(rupiah);
                            </script> --}}
                        </div>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div class="d-flex align-items-center mb-6">
				<!--begin::Symbol-->
				<div class="symbol symbol-45px w-40px me-5">
					<span class="symbol-label bg-lighten">
						<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
						<span class="svg-icon svg-icon-1">
							<img src="assets/img/jne.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">JNE Reg</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">
                            {{ number_format($courier->where('name', 'JNE REG')->count(),0,',','.' ) }}
                            {{-- <script>
                                var bilangan = {{$all_inputers->where('courier', 'JNE REG')->count()}};

                                var	number_string = bilangan.toString(),
                                    sisa 	= number_string.length % 3,
                                    rupiah 	= number_string.substr(0, sisa),
                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                if (ribuan) {
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                }

                                document.write(rupiah);
                            </script> --}}
                        </div>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div class="d-flex align-items-center mb-6">
				<!--begin::Symbol-->
				<div class="symbol symbol-45px w-40px me-5">
					<span class="symbol-label bg-lighten">
						<!--begin::Svg Icon | path: icons/duotune/electronics/elc005.svg-->
						<span class="svg-icon svg-icon-1">
							<img src="assets/img/jnt.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">J&T</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">
                            {{ number_format($courier->where('name', 'JNT')->count(),0,',','.' ) }}
                            {{-- <script>
                                var bilangan = {{$all_inputers->where('courier', 'JNT')->count()}};

                                var	number_string = bilangan.toString(),
                                    sisa 	= number_string.length % 3,
                                    rupiah 	= number_string.substr(0, sisa),
                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                if (ribuan) {
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                }

                                document.write(rupiah);
                            </script> --}}
                        </div>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div class="d-flex align-items-center mb-6">
				<!--begin::Symbol-->
				<div class="symbol symbol-45px w-40px me-5">
					<span class="symbol-label bg-lighten">
						<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
						<span class="svg-icon svg-icon-1">
							<img src="assets/img/pos.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100 ">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">POS</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">
                            {{ number_format($courier->where('name', 'POS')->count(),0,',','.' ) }}
                            {{-- <script>
                                var bilangan = {{$all_inputers->where('courier', 'POS')->count()}};

                                var	number_string = bilangan.toString(),
                                    sisa 	= number_string.length % 3,
                                    rupiah 	= number_string.substr(0, sisa),
                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                if (ribuan) {
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                }

                                document.write(rupiah);
                            </script> --}}
                        </div>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div class="d-flex align-items-center mb-6">
				<!--begin::Symbol-->
				<div class="symbol symbol-45px w-40px me-5">
					<span class="symbol-label bg-lighten">
						<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
						<span class="svg-icon svg-icon-1">
							<img src="assets/img/ninja.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Ninja</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">
                            {{ number_format($courier->where('name', 'Ninja')->count(),0,',','.' ) }}
                            {{-- <script>
                                var bilangan = {{$all_inputers->where('courier', 'Ninja')->count()}};

                                var	number_string = bilangan.toString(),
                                    sisa 	= number_string.length % 3,
                                    rupiah 	= number_string.substr(0, sisa),
                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                if (ribuan) {
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                }

                                document.write(rupiah);
                            </script> --}}
                        </div>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div class="d-flex align-items-center">
				<!--begin::Symbol-->
				<div class="symbol symbol-45px w-40px me-5">
					<span class="symbol-label bg-lighten">
						<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
						<span class="svg-icon svg-icon-1">
							<img src="assets/img/sicepat.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Si Cepat</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">
                            {{ number_format($courier->where('name', 'Sicepat')->count(),0,',','.' ) }}
                            {{-- <script>
                                var bilangan = {{$all_inputers->where('courier', 'Sicepat')->count()}};

                                var	number_string = bilangan.toString(),
                                    sisa 	= number_string.length % 3,
                                    rupiah 	= number_string.substr(0, sisa),
                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                if (ribuan) {
                                    separator = sisa ? '.' : '';
                                    rupiah += separator + ribuan.join('.');
                                }

                                document.write(rupiah);
                            </script> --}}
                        </div>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div>
			<!--end::Item-->
		</div>
		<!--end::Items-->
	</div>
	<!--end::Body-->
</div>
<!--end::Mixed Widget 1-->
