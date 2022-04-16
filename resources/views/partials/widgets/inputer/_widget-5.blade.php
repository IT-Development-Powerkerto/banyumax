<!--begin::Mixed Widget 1-->
<div class="card card-xl-stretch mb-5 mb-xl-8">
	<!--begin::Body-->
	<div class="card-body p-0">
		<!--begin::Header-->
		<div class="px-9 pt-7 card-rounded h-275px w-100 bg-success">
			<!--begin::Heading-->
			<div class="d-flex flex-stack">
				<h3 class="m-0 text-white fw-bolder fs-3">Warehouse</h3>
			</div>
			<!--end::Heading-->
			<!--begin::Balance-->
			<div class="d-flex text-center flex-column text-white pt-8">
				<span class="fw-bold fs-7">Warehouse</span>
				<span class="fw-bolder fs-2x pt-1">
                    <script>
                        var bilangan = {{$all_inputers->count()}};

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
                </span>
			</div>
			<!--end::Balance-->
		</div>
		<!--end::Header-->
		<!--begin::Items-->
		<div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
			<!--begin::Item-->
			<div class="d-flex align-items-center mb-6">
				<!--begin::Symbol-->
				<div class="symbol symbol-45px w-40px me-5">
					<span class="symbol-label bg-lighten">
						<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
						<i class="la la-warehouse" style="font-size:24px"></i>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Cilacap</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">
                            <script>
                                var bilangan = {{$all_inputers->where('warehouse', 'Cilacap')->count()}};

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
						<i class="la la-warehouse" style="font-size:24px"></i>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Kosambi</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">
                            <script>
                                var bilangan = {{$all_inputers->where('warehouse', 'Kosambi')->count()}};

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
						<i class="la la-warehouse" style="font-size: 24px"></i>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Tandes</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">
                            <script>
                                var bilangan = {{$all_inputers->where('warehouse', 'Tandes.Sby')->count()}};

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
