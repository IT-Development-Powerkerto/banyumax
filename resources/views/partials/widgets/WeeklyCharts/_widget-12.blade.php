
									<!--begin::Statistics Widget 5-->
									<label class="card card-xl-stretch mb-5 mb-xl-8 bg-white">
										<!--begin::Body-->
										<div class="card-body rounded shadow-sm" style="color:#1961A6; border:1px solid #1961A6">
											<div class="fw-bold fs-3 mb-2 mt-5">CAQ Total</div>
											<div class="fw-bolder fs-3hx mt-n2">{{($quantity == 0) ? 0 : round((($advertising_week_count / $quantity)/($omset/$quantity))*100,1)}} %</div>
										</div>
										<!--end::Body-->
									</label>
									<!--end::Statistics Widget 5-->
