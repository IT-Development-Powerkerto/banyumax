
		<!--begin::Charts Widget 6-->
		<div class="card shadow-sm">
			<!--begin::Header-->
			<div class="card-header border-0 bg-white py-5">
				<h3 class="card-title fw-bolder text-dark">Total Omset</h3>
				<label class="my-auto px-3 rounded fs-5 fw-bolder bg-light-success text-success">{{round(($inputer->sum('total_price') - $inputer->sum('product_promotion'))/ 1000000, 1)}} JT</label>
                <input id="omset_week1" value="{{$omset_week1}}" hidden/>
				<input id="omset_week2" value="{{$omset_week2}}" hidden/>
				<input id="omset_week3" value="{{$omset_week3}}" hidden/>
				<input id="omset_week4" value="{{$omset_week4}}" hidden/>

				<input id="advertising_week1" value="{{$advertising_week1}}" hidden/>
				<input id="advertising_week2" value="{{$advertising_week2}}" hidden/>
				<input id="advertising_week3" value="{{$advertising_week3}}" hidden/>
				<input id="advertising_week4" value="{{$advertising_week4}}" hidden/>

				<input id="lead_week1" value="{{$lead_week1}}" hidden/>
				<input id="lead_week2" value="{{$lead_week2}}" hidden/>
				<input id="lead_week3" value="{{$lead_week3}}" hidden/>
				<input id="lead_week4" value="{{$lead_week4}}" hidden/>

				<input id="closing_week1" value="{{$closing_week1}}" hidden/>
				<input id="closing_week2" value="{{$closing_week2}}" hidden/>
				<input id="closing_week3" value="{{$closing_week3}}" hidden/>
				<input id="closing_week4" value="{{$closing_week4}}" hidden/>
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
                                $week1=0;
                                $week2=0;
                                $week3=0;
                                $week4=0;
                            ?>
                            @foreach ($product as $product)
                                {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}
                                <input id="{{$week1+=1}} omset_week1" value="{{$omset_week1->where('product_name', $product->name)->sum('total_price') - $omset_week1->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$week2+=1}} omset_week2" value="{{$omset_week2->where('product_name', $product->name)->sum('total_price') - $omset_week2->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$week3+=1}} omset_week3" value="{{$omset_week3->where('product_name', $product->name)->sum('total_price') - $omset_week3->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
                                <input id="{{$week4+=1}} omset_week4" value="{{$omset_week4->where('product_name', $product->name)->sum('total_price') - $omset_week4->where('product_name', $product->name)->sum('product_promotion')}}" hidden/>
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
										<div class="font-size-sm fw-bold text-{{$icon->where('id', ($n%5 == 0) ? 5 : $n%5)->implode('name')}}">{{round(($omset_week_count->where('product_name', $product->name)->sum('total_price')-$omset_week_count->where('product_name', $product->name)->sum('product_promotion')) / 1000000, 1)}} JT</div>
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
