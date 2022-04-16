
		<!--begin::Charts Widget 6-->
		<div class="card shadow-sm">
			<!--begin::Header-->
			<div class="card-header border-0 bg-white py-5">
				<h3 class="card-title fw-bolder text-dark">Total Omset</h3>
				<label class="my-auto px-3 rounded fs-5 fw-bolder bg-light-success text-success">{{round(($inputer->sum('total_price') - $inputer->sum('product_promotion')) / 1000000, 1)}} JT</label>
				<input id="omset_su" value="{{$omset_su}}" hidden/>
				<input id="omset_mo" value="{{$omset_mo}}" hidden/>
				<input id="omset_tu" value="{{$omset_tu}}" hidden/>
				<input id="omset_we" value="{{$omset_we}}" hidden/>
				<input id="omset_th" value="{{$omset_th}}" hidden/>
				<input id="omset_fr" value="{{$omset_fr}}" hidden/>
				<input id="omset_sa" value="{{$omset_sa}}" hidden/>

				<input id="advertising_su" value="{{$advertising_su}}" hidden/>
				<input id="advertising_mo" value="{{$advertising_mo}}" hidden/>
				<input id="advertising_tu" value="{{$advertising_tu}}" hidden/>
				<input id="advertising_we" value="{{$advertising_we}}" hidden/>
				<input id="advertising_th" value="{{$advertising_th}}" hidden/>
				<input id="advertising_fr" value="{{$advertising_fr}}" hidden/>
				<input id="advertising_sa" value="{{$advertising_sa}}" hidden/>

				<input id="lead_su" value="{{$lead_su}}" hidden/>
				<input id="lead_mo" value="{{$lead_mo}}" hidden/>
				<input id="lead_tu" value="{{$lead_tu}}" hidden/>
				<input id="lead_we" value="{{$lead_we}}" hidden/>
				<input id="lead_th" value="{{$lead_th}}" hidden/>
				<input id="lead_fr" value="{{$lead_fr}}" hidden/>
				<input id="lead_sa" value="{{$lead_sa}}" hidden/>

				<input id="closing_su" value="{{$closing_su}}" hidden/>
				<input id="closing_mo" value="{{$closing_mo}}" hidden/>
				<input id="closing_tu" value="{{$closing_tu}}" hidden/>
				<input id="closing_we" value="{{$closing_we}}" hidden/>
				<input id="closing_th" value="{{$closing_th}}" hidden/>
				<input id="closing_fr" value="{{$closing_fr}}" hidden/>
				<input id="closing_sa" value="{{$closing_sa}}" hidden/>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<div class="row">
					<div class="col-4 d-flex flex-column">
						<!--begin::Block-->
						<div class="shadow-sm p-8 rounded rounded-xl flex-grow-1">
							{{-- <input id="total_omset" value="{{$total_omset}}" hidden/> --}}
                            <input id="product_count" value="{{$product->count()}}" hidden/>
							<?php
                                $n=0;
                                $su=0;
                                $mo=0;
                                $tu=0;
                                $we=0;
                                $th=0;
                                $fr=0;
                                $sa=0;
                            ?>
                            @foreach ($product as $product)
                                {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}
                                <input id="{{$su+=1}} omset_su" value="{{$omset_su->where('product_name', $product->name)->sum('total_price') - $omset_su->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$mo+=1}} omset_mo" value="{{$omset_mo->where('product_name', $product->name)->sum('total_price') - $omset_mo->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$tu+=1}} omset_tu" value="{{$omset_tu->where('product_name', $product->name)->sum('total_price') - $omset_tu->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$we+=1}} omset_we" value="{{$omset_we->where('product_name', $product->name)->sum('total_price') - $omset_we->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$th+=1}} omset_th" value="{{$omset_th->where('product_name', $product->name)->sum('total_price') - $omset_th->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$fr+=1}} omset_fr" value="{{$omset_fr->where('product_name', $product->name)->sum('total_price') - $omset_fr->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$sa+=1}} omset_sa" value="{{$omset_sa->where('product_name', $product->name)->sum('total_price') - $omset_sa->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
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
										<div class="font-size-sm fw-bold text-{{$icon->where('id', ($n%5 == 0) ? 5 : $n%5)->implode('name')}}">{{round(($omset_day_count->where('product_name', $product->name)->sum('total_price')-$omset_day_count->where('product_name', $product->name)->sum('product_promotion')) / 1000000, 1)}} JT</div>
                                    </div>
                                </div>
                                <!--end::Item-->
                            @endforeach
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
