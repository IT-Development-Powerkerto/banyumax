						<!--begin::Statistics Widget 3-->
						<div class="card shadow-sm card-xl-stretch mb-5 mb-xl-8">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column p-0">
								<div class="d-flex flex-stack flex-grow-1 card-p">
									<div class="d-flex flex-column me-2">
										<label class="my-auto px-3 rounded text-dark fw-bolder fs-3">Closing Rate</label>
									</div>
									<span class="symbol symbol-50px">
										<span class="symbol-label fs-5 fw-bolder bg-light-success text-success">{{($lead_count->count() == 0) ? 0 : round(($closing_count->count() / $lead_count->count())*100, 1)}} %</span>
									</span>
								</div>
								<div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="success" style="height: 150px"></div>
							</div>
                            <input id="CR_week1" value="{{($lead_week1->count() == 0) ? 0 : ($closing_week1->count() / $lead_week1->count())*100}}" hidden/>
                            <input id="CR_week2" value="{{($lead_week2->count() == 0) ? 0 : ($closing_week2->count() / $lead_week2->count())*100}}" hidden/>
                            <input id="CR_week3" value="{{($lead_week3->count() == 0) ? 0 : ($closing_week3->count() / $lead_week3->count())*100}}" hidden/>
                            <input id="CR_week4" value="{{($lead_week4->count() == 0) ? 0 : ($closing_week4->count() / $lead_week4->count())*100}}" hidden/>
							<!--end::Body-->
						</div>
						<!--end::Statistics Widget 3-->
