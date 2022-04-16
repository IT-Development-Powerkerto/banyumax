
		<!--begin::Charts Widget 6-->
		<div class="card shadow-sm">
			<!--begin::Header-->
			<div class="card-header border-0 bg-white py-5">
				<h3 class="card-title fw-bolder text-dark">Total Bottle</h3>
				<label class="my-auto px-3 rounded fs-5 fw-bolder bg-light-success text-success">
                    <script>
                        var bilangan = {{$inputer->sum('quantity')}};

                        var	number_string = bilangan.toString(),
                            sisa 	= number_string.length % 3,
                            rupiah 	= number_string.substr(0, sisa),
                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        document.write(rupiah);
                    </script> Bottle
                </label>
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
                                <input id="{{$jan+=1}} bottle_jan" value="{{$omset_jan->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$feb+=1}} bottle_feb" value="{{$omset_feb->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$mar+=1}} bottle_mar" value="{{$omset_mar->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$apr+=1}} bottle_apr" value="{{$omset_apr->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$may+=1}} bottle_may" value="{{$omset_may->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$jun+=1}} bottle_jun" value="{{$omset_jun->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$jul+=1}} bottle_jul" value="{{$omset_jul->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$aug+=1}} bottle_aug" value="{{$omset_aug->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$sep+=1}} bottle_sep" value="{{$omset_sep->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$okt+=1}} bottle_okt" value="{{$omset_okt->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$nov+=1}} bottle_nov" value="{{$omset_nov->where('product_name', $product->name)->sum('quantity')}}" hidden/>
                                <input id="{{$des+=1}} bottle_des" value="{{$omset_des->where('product_name', $product->name)->sum('quantity')}}" hidden/>
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
                                        <div class="font-size-sm fw-bold text-{{$icon->where('id', ($n%5 == 0) ? 5 : $n%5)->implode('name')}}">
                                            <script>
                                                var bilangan = {{$omset_month_count->where('product_name', $product->name)->sum('quantity')}};

                                                var	number_string = bilangan.toString(),
                                                    sisa 	= number_string.length % 3,
                                                    rupiah 	= number_string.substr(0, sisa),
                                                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                if (ribuan) {
                                                    separator = sisa ? '.' : '';
                                                    rupiah += separator + ribuan.join('.');
                                                }

                                                document.write(rupiah);
                                            </script>
                                        </div>
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
					<div class="card-rounded" id="kt_charts_widget_10_chart" style="height: 100%"></div>
					<!--end::Chart-->
				</div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::Charts Widget 6-->
		</div>
