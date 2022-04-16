						<!--begin::Statistics Widget 3-->
						<div class="card shadow-sm card-xl-stretch mt-n5 mb-xl-8">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column p-0">
								<div class="d-flex flex-stack flex-grow-1 card-p">
									<div class="d-flex flex-column me-2">
										<label class="text-dark fw-bolder fs-3">Cost Aquisition</label>
									</div>
									<span class="my-auto px-3 rounded fs-5 fw-bolder bg-light-primary text-primary">{{($omset_day_count->sum('total_price')-$omset_day_count->sum('product_promotion') == 0) ? 0 : round(($advertising_day_count / ($omset_day_count->sum('total_price')-$omset_day_count->sum('product_promotion')))*100, 1)}} %</span>
								</div>
								<div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px"></div>
							</div>
                            <input id="CA_su" value="{{($omset_su->count() == 0) ? 0 : ($advertising_su / $omset_su->count())*100}}" hidden/>
                            <input id="CA_mo" value="{{($omset_mo->count() == 0) ? 0 : ($advertising_mo / $omset_mo->count())*100}}" hidden/>
                            <input id="CA_tu" value="{{($omset_tu->count() == 0) ? 0 : ($advertising_tu / $omset_tu->count())*100}}" hidden/>
                            <input id="CA_we" value="{{($omset_we->count() == 0) ? 0 : ($advertising_we / $omset_we->count())*100}}" hidden/>
                            <input id="CA_th" value="{{($omset_th->count() == 0) ? 0 : ($advertising_th / $omset_th->count())*100}}" hidden/>
                            <input id="CA_fr" value="{{($omset_fr->count() == 0) ? 0 : ($advertising_fr / $omset_fr->count())*100}}" hidden/>
                            <input id="CA_sa" value="{{($omset_sa->count() == 0) ? 0 : ($advertising_sa / $omset_sa->count())*100}}" hidden/>
							<!--end::Body-->
						</div>
						<!--end::Statistics Widget 3-->
