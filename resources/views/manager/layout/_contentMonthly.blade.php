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
		<div class="col-xl-4">

			@include('partials/widgets/manager/_widget-5')


		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/manager/_widget-3')

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/manager/_widget-4')

		</div>
	</div>

	<!--begin::Action group-->
	<div class="d-flex align-items-center justify-content-between rounded mt-n5 mb-5 py-3" style="background-color: rgba(0, 80, 157, 0.9)">
		<ul class="nav">
			<li class="nav-item">
				<h1 class="text-white fw-bold fs-7 px-4 ms-2 mt-2"
					>Filter Dashboard</h1>
			</li>
		</ul>
		<ul class="nav me-2">
			<li class="nav-item">
				<a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4 me-1"
					href="{{route('manager')}}">Daily</a>
			</li>
			<li class="nav-item">
				<a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4 me-1"
					href="{{ route ('Managerweeklydashboard') }}">Weekly</a>
			</li>
			<li class="nav-item">
				<a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light active fw-bold fs-7 px-4"
					href="{{ route ('Managermonthlydashboard') }}">Monthly</a>
			</li>
		</ul>
	</div>
	<!--end::Action group-->

	<div class="row gy-5 g-xl-12 my-1">
		<!--begin::Col-->
		<div class="col-xl-6">

			@include('partials/widgets/MonthlyCharts/_widget-1')

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3">

			@include('partials/widgets/MonthlyCharts/_widget-2')
			<!--begin::Col-->
			<div class="col-xl-12 mt-7">

				@include('partials/widgets/MonthlyCharts/_widget-4')

			</div>
			<!--end::Col-->

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3">

			@include('partials/widgets/MonthlyCharts/_widget-3')
			<!--begin::Col-->
			<div class="col-xl-12 mt-7">

				@include('partials/widgets/MonthlyCharts/_widget-5')

			</div>
			<!--end::Col-->

		</div>
		<!--end::Col-->

		<!--begin::Col-->
		<div class="col-xl-3 mt-n2">

			@include('partials/widgets/MonthlyCharts/_widget-6')

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3 mt-n2">

			@include('partials/widgets/MonthlyCharts/_widget-7')

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-3 mt-n2">

			@include('partials/widgets/MonthlyCharts/_widget-8')

		</div>
		<!--end::Col-->

		<!--begin::Col-->
		<div class="col-xl-3 mt-n2">

			@include('partials/widgets/MonthlyCharts/_widget-9')

		</div>
		<!--end::Col-->

		<div class="row gy-5 mt-n20 g-xl-1">
            @include('manager/layout/ManagerContent')
        </div>

</div>
<!--end::Container-->
