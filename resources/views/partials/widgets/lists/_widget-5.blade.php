<!--begin::List Widget 5-->
<div class="rounded-3 card card-l-stretch mb-xl-8 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 315px">
	<!--begin::Header-->
	<div class="card-header align-items-center border-0 mt-4">
		<h3 class="card-title align-items-start flex-column">
			<span class="fw-bolder mb-2 text-dark">Announcements</span>
			<span class="text-muted fw-bold fs-7">{{$announcements->count()}} Announcements</span>
		</h3>
	</div>
	<!--end::Header-->
	<!--end: Card Body-->
	<div class="card-body pt-5">
        @foreach ($announcements->reverse() as $announcement)
		<div class="timeline timeline-5">
			<div class="timeline-items">
				<!--begin::Item-->
				<div class="timeline-item">
					<!--begin::Icon-->
					<div class="timeline-badge">
						<span class="svg-icon-primary svg-icon-md">
							<i class="{{$announcement->icon->name}}"></i>
						</span>
					</div>
					<!--end::Icon-->
					<!--begin::Info-->
					<div class="timeline-desc timeline-desc-light-primary mx-3">
						<span class="fw-mormal text-gray-800">{{$announcement->created_at}}</span>
						<p class="fw-bolder pb-2">
							{{$announcement->announcement}}
						</p>
					</div>
					<!--end::Info-->
				</div>
				<!--end::Item-->
			</div>
		</div>
		<!--end::Timeline-->
		@endforeach
	</div>
	<!--end: Card Body-->
</div>
<!--end: List Widget 5-->
