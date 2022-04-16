					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid mt-15 " id="kt_content">
						<!--begin::Container-->
						<div class="container-xxxl" id="kt_content_container">
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0">Information</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									@include('partials/widgets/ceo/WeeklyInfoDailyADV')
									@include('partials/widgets/ceo/BudgetingReq')
									@include('partials/widgets/ceo/BudgetingRel')
									@include('partials/widgets/ceo/ActivityEvaluation')
									@include('partials/widgets/ceo/LogBudgeting')   
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
						</div>
					</div>
