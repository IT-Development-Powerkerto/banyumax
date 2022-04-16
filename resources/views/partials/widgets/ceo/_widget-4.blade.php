<!--begin::Mixed Widget 1-->
<div class="card card-xl-stretch mb-5 mb-xl-8">
	<!--begin::Body-->
	<div class="card-body p-0">
		<!--begin::Header-->
		<div class="px-9 pt-7 card-rounded h-275px w-100 bg-danger">
			<!--begin::Heading-->
			<div class="d-flex flex-stack">
				<h3 class="m-0 text-white fw-bolder fs-3">Expense</h3>
			</div>
			<!--end::Heading-->
			<!--begin::Balance-->
			<div class="d-flex text-center flex-column text-white pt-8">
				<span class="fw-bold fs-7">Expense</span>
				<span id="budgeting" class="fw-bolder fs-2x pt-1">Rp. {{$budgeting->where('status', 1)->sum('requirement')}}</span>
			</div>
			<!--end::Balance-->
		</div>
		<!--end::Header-->
		<!--begin::Items-->
		<div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 233px; margin-top: -100px">
			<!--begin::Item-->
			@foreach ($budgeting->where('status', 1) as $budgeting)
			<div class="d-flex align-items-center mb-6">
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">{{$budgeting->user_name}}</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">Rp.
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
                        </div>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div>
            @endforeach
			<!--end::Item-->
			<!--begin::Item-->
			{{-- <div class="d-flex align-items-center mb-6">
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Hanif</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">Rp. 10.000.000</div>
					</div>
					<!--end::Label-->
				</div>
				<!--end::Description-->
			</div>
			<!--end::Item-->
			<!--begin::Item-->
			<div class="d-flex align-items-center">
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-5 text-gray-800 text-hover-primary fw-bolder">Isnan</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-5 text-gray-800 pe-1">Rp. 10.000.000</div>
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
