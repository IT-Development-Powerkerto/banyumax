
									<!--begin::Statistics Widget 5-->
									<label class="card card-xl-stretch mb-5 mb-xl-8 bg-white">
										<!--begin::Body-->
										<div class="card-body rounded shadow-sm" style="color:#1961A6; border:1px solid #1961A6">
											<div class="fw-bold fs-3 mb-2 mt-5">Closing Rate</div>
											<div class="fw-bolder fs-3hx mt-n2">{{($lead_count == 0) ? 0 : round(($closing_count / $lead_count)*100,1)}} %</div>
										</div>
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
                                        @foreach ($products as $product)
                                            {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}
                                            <input id="{{$su+=1}} lead_su" value="{{$lead_su->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$mo+=1}} lead_mo" value="{{$lead_mo->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$tu+=1}} lead_tu" value="{{$lead_tu->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$we+=1}} lead_we" value="{{$lead_we->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$th+=1}} lead_th" value="{{$lead_th->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$fr+=1}} lead_fr" value="{{$lead_fr->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$sa+=1}} lead_sa" value="{{$lead_sa->where('product_id', $product->id)->count()}}" hidden/>

                                            <input id="product {{$n+=1}}" value="{{$product->name}}" hidden/>
                                        @endforeach
										<!--end::Body-->
									</label>
									<!--end::Statistics Widget 5-->
