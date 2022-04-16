
									<!--begin::Statistics Widget 5-->
									<label class="card card-xl-stretch mb-5 mb-xl-8 bg-white">
										<!--begin::Body-->
										<div class="card-body rounded shadow-sm" style="color:#1961A6; border:1px solid #1961A6">
											<div class="fw-bold fs-3 mb-2 mt-5">Closing Rate</div>
											<div class="fw-bolder fs-3hx mt-n2">{{($lead_count == 0) ? 0 : round(($closing_count / $lead_count)*100, 1)}} %</div>
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
                                        @endforeach
										<!--end::Body-->
									</label>
									<!--end::Statistics Widget 5-->
