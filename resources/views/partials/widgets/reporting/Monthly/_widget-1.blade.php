
		<!--begin::Charts Widget 6-->
		<div class="card shadow-sm">
			<!--begin::Header-->
			<div class="card-header border-0 bg-white py-5">
				<h3 class="card-title fw-bolder text-dark">Total Omset</h3>
				<label class="my-auto px-3 rounded fs-5 fw-bolder bg-light-success text-success">{{round(($inputer->sum('total_price') - $inputer->sum('product_promotion')) / 1000000, 1)}} JT</label>
                    <input id="omset_jan" value="{{$omset_jan}}" hidden/>
                    <input id="omset_feb" value="{{$omset_feb}}" hidden/>
                    <input id="omset_mar" value="{{$omset_mar}}" hidden/>
                    <input id="omset_apr" value="{{$omset_apr}}" hidden/>
                    <input id="omset_may" value="{{$omset_may}}" hidden/>
                    <input id="omset_jun" value="{{$omset_jun}}" hidden/>
                    <input id="omset_jul" value="{{$omset_jul}}" hidden/>
                    <input id="omset_aug" value="{{$omset_aug}}" hidden/>
                    <input id="omset_sep" value="{{$omset_sep}}" hidden/>
                    <input id="omset_okt" value="{{$omset_okt}}" hidden/>
                    <input id="omset_nov" value="{{$omset_nov}}" hidden/>
                    <input id="omset_des" value="{{$omset_des}}" hidden/>

                    <input id="advertising_jan" value="{{$advertising_jan}}" hidden/>
                    <input id="advertising_feb" value="{{$advertising_feb}}" hidden/>
                    <input id="advertising_mar" value="{{$advertising_mar}}" hidden/>
                    <input id="advertising_apr" value="{{$advertising_apr}}" hidden/>
                    <input id="advertising_may" value="{{$advertising_may}}" hidden/>
                    <input id="advertising_jun" value="{{$advertising_jun}}" hidden/>
                    <input id="advertising_jul" value="{{$advertising_jul}}" hidden/>
                    <input id="advertising_aug" value="{{$advertising_aug}}" hidden/>
                    <input id="advertising_sep" value="{{$advertising_sep}}" hidden/>
                    <input id="advertising_okt" value="{{$advertising_okt}}" hidden/>
                    <input id="advertising_nov" value="{{$advertising_nov}}" hidden/>
                    <input id="advertising_des" value="{{$advertising_des}}" hidden/>

                    <input id="lead_jan" value="{{$lead_jan}}" hidden/>
                    <input id="lead_feb" value="{{$lead_feb}}" hidden/>
                    <input id="lead_mar" value="{{$lead_mar}}" hidden/>
                    <input id="lead_apr" value="{{$lead_apr}}" hidden/>
                    <input id="lead_may" value="{{$lead_may}}" hidden/>
                    <input id="lead_jun" value="{{$lead_jun}}" hidden/>
                    <input id="lead_jul" value="{{$lead_jul}}" hidden/>
                    <input id="lead_aug" value="{{$lead_aug}}" hidden/>
                    <input id="lead_sep" value="{{$lead_sep}}" hidden/>
                    <input id="lead_okt" value="{{$lead_okt}}" hidden/>
                    <input id="lead_nov" value="{{$lead_nov}}" hidden/>
                    <input id="lead_des" value="{{$lead_des}}" hidden/>

                    <input id="closing_jan" value="{{$closing_jan}}" hidden/>
                    <input id="closing_feb" value="{{$closing_feb}}" hidden/>
                    <input id="closing_mar" value="{{$closing_mar}}" hidden/>
                    <input id="closing_apr" value="{{$closing_apr}}" hidden/>
                    <input id="closing_may" value="{{$closing_may}}" hidden/>
                    <input id="closing_jun" value="{{$closing_jun}}" hidden/>
                    <input id="closing_jul" value="{{$closing_jul}}" hidden/>
                    <input id="closing_aug" value="{{$closing_aug}}" hidden/>
                    <input id="closing_sep" value="{{$closing_sep}}" hidden/>
                    <input id="closing_okt" value="{{$closing_okt}}" hidden/>
                    <input id="closing_nov" value="{{$closing_nov}}" hidden/>
                    <input id="closing_des" value="{{$closing_des}}" hidden/>
				</span>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<div class="row">
					<div class="col-4 d-flex flex-column">
						<!--begin::Block-->
						<div class="shadow-sm p-8 rounded rounded-xl flex-grow-1">
							<!--begin::Item-->
							<input id="product_count" value="{{$product->count()}}" hidden/>
							<?php
                                $n=0;
                                $jan=0;
                                $feb=0;
                                $mar=0;
                                $apr=0;
                                $may=0;
                                $jun=0;
                                $jul=0;
                                $aug=0;
                                $sep=0;
                                $okt=0;
                                $nov=0;
                                $des=0;
                            ?>
                            @foreach ($product as $product)
                                {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}
                                <input id="{{$jan+=1}} omset_jan" value="{{$omset_jan->where('product_name', $product->name)->sum('total_price') - $omset_jan->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$feb+=1}} omset_feb" value="{{$omset_feb->where('product_name', $product->name)->sum('total_price') - $omset_feb->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$mar+=1}} omset_mar" value="{{$omset_mar->where('product_name', $product->name)->sum('total_price') - $omset_mar->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$apr+=1}} omset_apr" value="{{$omset_apr->where('product_name', $product->name)->sum('total_price') - $omset_apr->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$may+=1}} omset_may" value="{{$omset_may->where('product_name', $product->name)->sum('total_price') - $omset_may->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$jun+=1}} omset_jun" value="{{$omset_jun->where('product_name', $product->name)->sum('total_price') - $omset_jun->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$jul+=1}} omset_jul" value="{{$omset_jul->where('product_name', $product->name)->sum('total_price') - $omset_jul->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$aug+=1}} omset_aug" value="{{$omset_aug->where('product_name', $product->name)->sum('total_price') - $omset_aug->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$sep+=1}} omset_sep" value="{{$omset_sep->where('product_name', $product->name)->sum('total_price') - $omset_sep->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$okt+=1}} omset_okt" value="{{$omset_okt->where('product_name', $product->name)->sum('total_price') - $omset_okt->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$nov+=1}} omset_nov" value="{{$omset_nov->where('product_name', $product->name)->sum('total_price') - $omset_nov->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$des+=1}} omset_des" value="{{$omset_des->where('product_name', $product->name)->sum('total_price') - $omset_des->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="product {{$n+=1}}" value="{{$product->name}}" hidden/>
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <div class="symbol symbol-circle symbol-white overflow-hidden flex-shrink-0 me-3">
                                        <span class="symbol-label">
                                            <img src="{{$product->image}}" class="h-100 align-self-end" alt="image">
                                        </span>
                                    </div>
                                    <div>
                                        <div class="font-size-sm fw-bold text-{{$icon->where('id', ($n%5 == 0) ? 5 : $n%5)->implode('name')}}">{{$product->name}}</div>
                                        <div class="font-size-sm fw-bold text-{{$icon->where('id', ($n%5 == 0) ? 5 : $n%5)->implode('name')}}">{{round(($omset_month_count->where('product_name', $product->name)->sum('total_price')-$omset_month_count->where('product_name', $product->name)->sum('product_promotion')) / 1000000, 1)}} JT</div>
                                    </div>
                                </div>
                                <!--end::Item-->
                            @endforeach
							<!--end::Item-->
						</div>
						<!--end::Block-->
					</div>
					<div class="col-8">
					<!--begin::Chart-->
					<div class="card-rounded" id="kt_charts_widget_9_chart" style="height: 100%"></div>
					<!--end::Chart-->
				</div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::Charts Widget 6-->
		</div>
