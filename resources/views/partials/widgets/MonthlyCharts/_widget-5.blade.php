
									<!--begin::Statistics Widget 5-->
									<label class="card card-xl-stretch mb-5 mb-xl-8 bg-white">
										<!--begin::Body-->
										<div class="card-body rounded shadow-sm" style="color:#1961A6; border:1px solid #1961A6">
											<div class="fw-bold fs-3 mb-2 mt-5">Upselling</div>
											<div class="fw-bolder fs-3hx mt-n2">{{ ($closing_count == 0) ? 0 : round($quantity / $closing_count, 1) }}</div>
										</div>
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
                                        @foreach ($products as $product)
                                            {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}
                                            <input id="{{$jan+=1}} closing_jan" value="{{$closing_jan->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$feb+=1}} closing_feb" value="{{$closing_feb->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$mar+=1}} closing_mar" value="{{$closing_mar->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$apr+=1}} closing_apr" value="{{$closing_apr->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$may+=1}} closing_may" value="{{$closing_may->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$jun+=1}} closing_jun" value="{{$closing_jun->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$jul+=1}} closing_jul" value="{{$closing_jul->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$aug+=1}} closing_aug" value="{{$closing_aug->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$sep+=1}} closing_sep" value="{{$closing_sep->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$okt+=1}} closing_okt" value="{{$closing_okt->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$nov+=1}} closing_nov" value="{{$closing_nov->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$des+=1}} closing_des" value="{{$closing_des->where('product_id', $product->id)->count()}}" hidden/>

                                            <input id="product {{$n+=1}}" value="{{$product->name}}" hidden/>
                                        @endforeach
										<!--end::Body-->
									</label>
									<!--end::Statistics Widget 5-->
