<!--begin::Container-->
<div id="kt_content_container" class="container-xxl" >
	<!--begin::Row-->
	<div class="row gy-5 g-xl-12 my-5">
		<!--begin::Col-->
        
        @foreach ($campaign as $campaign)
        <div class="col-xl-6">
			
			@include('partials/widgets/tables/_widget-5')

		</div>
        @endforeach

		<!--end::Col-->
	</div>
	<!--end::Row-->

</div>
<!--end::Container-->
