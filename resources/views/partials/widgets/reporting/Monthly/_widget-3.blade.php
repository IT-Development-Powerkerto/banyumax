						<!--begin::Statistics Widget 3-->
						<div class="card shadow-sm card-xl-stretch mt-n5 mb-xl-8">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column p-0">
								<div class="d-flex flex-stack flex-grow-1 card-p">
									<div class="d-flex flex-column me-2">
										<label class="text-dark fw-bolder fs-3">Cost Aquisition</label>
									</div>
									<span class="my-auto px-3 rounded fs-5 fw-bolder bg-light-primary text-primary">{{round(($omset_month_count->sum('total_price')-$omset_month_count->sum('product_promotion') == 0) ? 0 : ($advertising_month_count / ($omset_month_count->sum('total_price')-$omset_month_count->sum('product_promotion')))*100, 1)}} %</span>
								</div>
								<div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px"></div>
							</div>
                            <input id="CA_jan" value="{{($omset_jan->count() == 0) ? 0 : ($advertising_jan / $omset_jan->count())*100}}" hidden/>
                            <input id="CA_feb" value="{{($omset_feb->count() == 0) ? 0 : ($advertising_feb / $omset_feb->count())*100}}" hidden/>
                            <input id="CA_mar" value="{{($omset_mar->count() == 0) ? 0 : ($advertising_mar / $omset_mar->count())*100}}" hidden/>
                            <input id="CA_apr" value="{{($omset_apr->count() == 0) ? 0 : ($advertising_apr / $omset_apr->count())*100}}" hidden/>
                            <input id="CA_may" value="{{($omset_may->count() == 0) ? 0 : ($advertising_may / $omset_may->count())*100}}" hidden/>
                            <input id="CA_jun" value="{{($omset_jun->count() == 0) ? 0 : ($advertising_jun / $omset_jun->count())*100}}" hidden/>
                            <input id="CA_jul" value="{{($omset_jul->count() == 0) ? 0 : ($advertising_jul / $omset_jul->count())*100}}" hidden/>
                            <input id="CA_aug" value="{{($omset_aug->count() == 0) ? 0 : ($advertising_aug / $omset_aug->count())*100}}" hidden/>
                            <input id="CA_sep" value="{{($omset_sep->count() == 0) ? 0 : ($advertising_sep / $omset_sep->count())*100}}" hidden/>
                            <input id="CA_okt" value="{{($omset_okt->count() == 0) ? 0 : ($advertising_okt / $omset_okt->count())*100}}" hidden/>
                            <input id="CA_nov" value="{{($omset_nov->count() == 0) ? 0 : ($advertising_nov / $omset_nov->count())*100}}" hidden/>
                            <input id="CA_des" value="{{($omset_des->count() == 0) ? 0 : ($advertising_des / $omset_des->count())*100}}" hidden/>
							<!--end::Body-->
						</div>
						<!--end::Statistics Widget 3-->
