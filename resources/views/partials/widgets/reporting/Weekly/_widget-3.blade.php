						<!--begin::Statistics Widget 3-->
						<div class="card shadow-sm card-xl-stretch mt-n5 mb-xl-8">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column p-0">
								<div class="d-flex flex-stack flex-grow-1 card-p">
									<div class="d-flex flex-column me-2">
										<label class="my-auto px-3 rounded text-dark fw-bolder fs-3">Cost Aquisition</label>
									</div>
									<span class="symbol symbol-50px">
										<span class="symbol-label fs-5 fw-bolder bg-light-primary text-primary">{{(($omset_week_count->sum('total_price')-$omset_week_count->sum('product_promotion')) == 0) ? 0 : round(($advertising_week_count / ($omset_week_count->sum('total_price')-$omset_week_count->sum('product_promotion')))*100, 1)}} %</span>
									</span>
								</div>
								<div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px"></div>
							</div>
                            <input id="CA_week1" value="{{($omset_week1->count() == 0) ? 0 : ($advertising_week1 / $omset_week1->count())*100}}" hidden/>
                            <input id="CA_week2" value="{{($omset_week2->count() == 0) ? 0 : ($advertising_week2 / $omset_week2->count())*100}}" hidden/>
                            <input id="CA_week3" value="{{($omset_week3->count() == 0) ? 0 : ($advertising_week3 / $omset_week3->count())*100}}" hidden/>
                            <input id="CA_week4" value="{{($omset_week4->count() == 0) ? 0 : ($advertising_week4 / $omset_week4->count())*100}}" hidden/>
							<!--end::Body-->
						</div>
						<!--end::Statistics Widget 3-->
