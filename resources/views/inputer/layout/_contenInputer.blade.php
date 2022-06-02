<!--begin::Container-->
<div id="kt_content_container" class="container-xxl" >
	<!--begin::Row-->
	<div class="row gy-5 g-xl-12 my-5">
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/inputer/_widget-warehouse')


		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/inputer/_widget-payment')

		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4">

			@include('partials/widgets/inputer/_widget-courier')

		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row gy-5 mt-n20 g-xl-1">
		@include('inputer/layout/InputerContent')
	</div>
	<!--end::Row-->

</div>
<!--end::Container-->
