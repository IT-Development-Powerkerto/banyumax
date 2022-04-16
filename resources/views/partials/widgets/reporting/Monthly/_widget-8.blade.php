
		<!--begin::Charts Widget 6-->
		<div class="card shadow-sm">
			<!--begin::Header-->
			<div class="card-header border-0 bg-white py-5">
				<h3 class="card-title fw-bolder text-dark">Total Lead</h3>
				<label class="my-auto px-3 rounded fs-5 fw-bolder bg-light-success text-success">
                    <script>
                        var bilangan = {{$lead_count->count()}};

                        var	number_string = bilangan.toString(),
                            sisa 	= number_string.length % 3,
                            rupiah 	= number_string.substr(0, sisa),
                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        document.write(rupiah);
                    </script> Lead
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
                                <input id="{{$jan+=1}} lead_jan" value="{{$lead_jan->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$feb+=1}} lead_feb" value="{{$lead_feb->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$mar+=1}} lead_mar" value="{{$lead_mar->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$apr+=1}} lead_apr" value="{{$lead_apr->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$may+=1}} lead_may" value="{{$lead_may->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$jun+=1}} lead_jun" value="{{$lead_jun->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$jul+=1}} lead_jul" value="{{$lead_jul->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$aug+=1}} lead_aug" value="{{$lead_aug->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$sep+=1}} lead_sep" value="{{$lead_sep->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$okt+=1}} lead_okt" value="{{$lead_okt->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$nov+=1}} lead_nov" value="{{$lead_nov->where('product_id', $product->id)->count()}}" hidden/>
                                <input id="{{$des+=1}} lead_des" value="{{$lead_des->where('product_id', $product->id)->count()}}" hidden/>
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
                                                var bilangan = {{$lead_count->where('product_id', $product->id)->count()}};

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
					<div class="card-rounded" id="kt_charts_widget_11_chart" style="height: 100%"></div>
					<!--end::Chart-->
				</div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::Charts Widget 6-->
		</div>
