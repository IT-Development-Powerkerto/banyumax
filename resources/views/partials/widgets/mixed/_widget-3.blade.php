<!--begin::Mixed Widget 1-->
<div class="card card-xl-stretch mb-xl-8">
	<!--begin::Body-->
	<div class="card-body p-0">
		<!--begin::Header-->
		<div class="px-9 pt-7 card-rounded h-275px w-100 bg-primary">
			<!--begin::Heading-->
			<div class="d-flex flex-stack">
				<h3 class="m-0 text-white fw-bolder fs-3">Total Pricing</h3>
			</div>
			<!--end::Heading-->
			<!--begin::Balance-->
			<div class="d-flex text-center flex-column text-white pt-8">
				<span class="fw-bold fs-7">Your Balance</span>
				<span class="fw-bolder fs-2x pt-1">Rp. {{($paket->where('id', 1)->implode('price')*($user->where('exp', 1)->where('paket_id', 1)->count()-1))+($all_lead->count()*$paket->where('id', 2)->implode('price'))+($paket->where('id', 3)->implode('price')*$user->where('exp', 1)->where('paket_id', 3)->count())}}</span>
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
						<span class="svg-icon svg-icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
								<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
								<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
								<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-6 text-gray-800 text-hover-primary fw-bolder">Entrepreneur Plan</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-6 text-gray-800 pe-1">{{$paket->where('id', 1)->implode('price')*($user->where('exp', 1)->where('paket_id', 1)->count()-1)}}</div>
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
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path opacity="0.3" d="M15 19H7C5.9 19 5 18.1 5 17V7C5 5.9 5.9 5 7 5H15C16.1 5 17 5.9 17 7V17C17 18.1 16.1 19 15 19Z" fill="black" />
								<path d="M8.5 2H13.4C14 2 14.5 2.4 14.6 3L14.9 5H6.89999L7.2 3C7.4 2.4 7.9 2 8.5 2ZM7.3 21C7.4 21.6 7.9 22 8.5 22H13.4C14 22 14.5 21.6 14.6 21L14.9 19H6.89999L7.3 21ZM18.3 10.2C18.5 9.39995 18.5 8.49995 18.3 7.69995C18.2 7.29995 17.8 6.90002 17.3 6.90002H17V10.9H17.3C17.8 11 18.2 10.7 18.3 10.2Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-6 text-gray-800 text-hover-primary fw-bolder">Flexbile Plan</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-6 text-gray-800 pe-1">{{$all_lead->count()*$paket->where('id', 2)->implode('price')}}</div>
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
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
								<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</span>
				</div>
				<!--end::Symbol-->
				<!--begin::Description-->
				<div class="d-flex align-items-center flex-wrap w-100">
					<!--begin::Title-->
					<div class="mb-1 pe-3 flex-grow-1">
						<label class="fs-6 text-gray-800 text-hover-primary fw-bolder">Corporate Plan</label>
					</div>
					<!--end::Title-->
					<!--begin::Label-->
					<div class="d-flex align-items-center">
						<div class="fw-bolder fs-6 text-gray-800 pe-1">{{$paket->where('id', 3)->implode('price')*$user->where('exp', 1)->where('paket_id', 3)->count()}}</div>
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
