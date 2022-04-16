						<!--begin::Statistics Widget 3-->
						<div class="card shadow-sm card-xl-stretch mb-5 mb-xl-8">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column p-0">
								<div class="d-flex flex-stack flex-grow-1 card-p">
									<div class="d-flex flex-column me-2">
										<label class="text-dark fw-bolder fs-3">Closing Rate</label>
									</div>
									<span class="my-auto px-3 rounded fs-5 fw-bolder bg-light-success text-success">{{($lead_count->count() == 0) ? 0 : round(($closing_count->count() / $lead_count->count())*100, 1)}} %</span>
								</div>
								<div class="statistics-widget-3-chart card-rounded-bottom" data-kt-chart-color="success" style="height: 150px"></div>
							</div>
                            <input id="CR_su" value="{{($lead_su->count() == 0) ? 0 : ($closing_su->count() / $lead_su->count())*100}}" hidden/>
                            <input id="CR_mo" value="{{($lead_mo->count() == 0) ? 0 : ($closing_mo->count() / $lead_mo->count())*100}}" hidden/>
                            <input id="CR_tu" value="{{($lead_tu->count() == 0) ? 0 : ($closing_tu->count() / $lead_tu->count())*100}}" hidden/>
                            <input id="CR_we" value="{{($lead_we->count() == 0) ? 0 : ($closing_we->count() / $lead_we->count())*100}}" hidden/>
                            <input id="CR_th" value="{{($lead_th->count() == 0) ? 0 : ($closing_th->count() / $lead_th->count())*100}}" hidden/>
                            <input id="CR_fr" value="{{($lead_fr->count() == 0) ? 0 : ($closing_fr->count() / $lead_fr->count())*100}}" hidden/>
                            <input id="CR_sa" value="{{($lead_sa->count() == 0) ? 0 : ($closing_sa->count() / $lead_sa->count())*100}}" hidden/>
							<!--end::Body-->
						</div>
						<!--end::Statistics Widget 3-->
