<!--begin::Mixed Widget 1-->
<div class="card card-xl-stretch mb-xl-8">
	<!--begin::Body-->
	<div class="card-body p-0">
		<!--begin::Header-->
		<div class="px-9 pt-7 card-rounded h-275px w-100 bg-primary">
			<!--begin::Heading-->
			<div class="d-flex flex-stack">
				<h3 class="m-0 text-white fw-bolder fs-3">Omzet</h3>
			</div>
			<!--end::Heading-->
			<!--begin::Balance-->
			<div class="d-flex text-center flex-column text-white pt-8">
				<span class="fw-bold fs-7">Your Balance</span>
				<span id="omset" class="fw-bolder fs-2x pt-1">Rp.
                    <script>
                        var bilangan = {{$omset_all->sum('total_price') - $omset_all->sum('product_promotion')}};

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
		<div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 233px; margin-top: -100px">
			<!--begin::Item-->
            @foreach ($products as $product)
			<div class="d-flex align-items-center mb-6">
				<!--begin::Symbol-->
				<div class="symbol symbol-45px w-40px me-5">
					<span class="symbol-label bg-lighten">
						<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
						<span class="svg-icon svg-icon-1">
							@if(is_null($product->image))
							<img src="assets/img/default_product.png" width="38px" alt="" />
							@else
							<img src="{{ $product->image }}" width="38px" alt="">
							@endif
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">{{ $product->name }}</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<label id="product_count" class="fw-bolder fs-5 text-gray-800 pe-1">Rp.
                            <script>
                                var bilangan = {{ $omset_all->where('product_name', $product->name)->sum('total_price') - $omset_all->where('product_name', $product->name)->sum('product_promotion') }};

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
                        </label>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div>
            @endforeach
			<!--end::Item-->
			<!--begin::Item-->
			{{-- <div class="d-flex align-items-center mb-6">
				<!--begin::Symbol-->
				<div class="symbol symbol-45px w-40px me-5">
					<span class="symbol-label bg-lighten">
						<!--begin::Svg Icon | path: icons/duotune/electronics/elc005.svg-->
						<span class="svg-icon svg-icon-1">
							<img src="assets/img/gizidat.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Gizidat</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">Rp. 20.000.000</div>
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
							<img src="assets/img/generos.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100 ">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Generos</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">Rp. 20.000.000</div>
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
							<img src="assets/img/frehmag.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Freshmag</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">Rp. 20.000.000</div>
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
							<img src="assets/img/rube.png" width="38px" alt="">
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Rube</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">Rp. 20.000.000</div>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div> --}}
			<!--end::Item-->
		</div>
		<!--end::Items-->
	</div>
	<!--end::Body-->
</div>
<!--end::Mixed Widget 1-->
