<!--begin::Container-->
<div id="kt_content_container" class="container-xxl" >
	<!--begin::Row-->
	<div class="row gy-5 g-xl-12 my-5">
		@if(session()->has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('success') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
	
		@if(session()->has('error'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ session('error') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
		<!--begin::Col-->
		<div class="col-xl-6">

			@include('partials/widgets/tables/_widget-7')
			
		</div>
		<!--end::Col-->

		<!--begin::Col-->
		<div class="col-xl-6">

			@include('partials/widgets/tables/_widget-6')

		</div>

	</div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row gy-5 my-n8 g-xl-1">
		@include('partials/widgets/tables/_widget-8-user')
	</div>
	<!--end::Row-->

</div>
<!--end::Container-->