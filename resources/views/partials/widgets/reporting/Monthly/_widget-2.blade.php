						<!--begin::Statistics Widget 3-->
						<div class="card shadow-sm card-xl-stretch mb-5 mb-xl-8">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column p-0">
								<div class="d-flex flex-stack flex-grow-1 card-p">
									<div class="d-flex flex-column me-2">
										<label class="text-dark fw-bolder fs-3">Closing Rate</label>
									</div>
									<label class="my-auto px-3 rounded fs-5 fw-bolder bg-light-success text-success">{{round(($lead_count->count() == 0) ? 0 : ($closing_count->count() / $lead_count->count())*100, 1)}} %</label>
								</div>
								<div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="success" style="height: 150px"></div>
							</div>
                            <input id="CR_jan" value="{{($lead_jan->count() == 0) ? 0 : ($closing_jan->count() / $lead_jan->count())*100}}" hidden/>
                            <input id="CR_feb" value="{{($lead_feb->count() == 0) ? 0 : ($closing_feb->count() / $lead_feb->count())*100}}" hidden/>
                            <input id="CR_mar" value="{{($lead_mar->count() == 0) ? 0 : ($closing_mar->count() / $lead_mar->count())*100}}" hidden/>
                            <input id="CR_apr" value="{{($lead_apr->count() == 0) ? 0 : ($closing_apr->count() / $lead_apr->count())*100}}" hidden/>
                            <input id="CR_may" value="{{($lead_may->count() == 0) ? 0 : ($closing_may->count() / $lead_may->count())*100}}" hidden/>
                            <input id="CR_jun" value="{{($lead_jun->count() == 0) ? 0 : ($closing_jun->count() / $lead_jun->count())*100}}" hidden/>
                            <input id="CR_jul" value="{{($lead_jul->count() == 0) ? 0 : ($closing_jul->count() / $lead_jul->count())*100}}" hidden/>
                            <input id="CR_aug" value="{{($lead_aug->count() == 0) ? 0 : ($closing_aug->count() / $lead_aug->count())*100}}" hidden/>
                            <input id="CR_sep" value="{{($lead_sep->count() == 0) ? 0 : ($closing_sep->count() / $lead_sep->count())*100}}" hidden/>
                            <input id="CR_okt" value="{{($lead_okt->count() == 0) ? 0 : ($closing_okt->count() / $lead_okt->count())*100}}" hidden/>
                            <input id="CR_nov" value="{{($lead_nov->count() == 0) ? 0 : ($closing_nov->count() / $lead_nov->count())*100}}" hidden/>
                            <input id="CR_des" value="{{($lead_des->count() == 0) ? 0 : ($closing_des->count() / $lead_des->count())*100}}" hidden/>
							<!--end::Body-->
						</div>
						<!--end::Statistics Widget 3-->
