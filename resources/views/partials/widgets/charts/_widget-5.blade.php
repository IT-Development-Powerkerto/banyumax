
									<!--begin::Statistics Widget 5-->
									<label class="card card-xl-stretch mb-5 mb-xl-8 bg-white">
										<!--begin::Body-->
										<div class="card-body rounded shadow-sm" style="color:#1961A6; border:1px solid #1961A6">
											<div class="fw-bold fs-3 mb-2 mt-5">Upselling</div>
											<div class="fw-bolder fs-3hx mt-n2">{{ ($closing_count == 0) ? 0 : round($quantity / $closing_count, 1) }}</div>
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
                                            <input id="{{$su+=1}} closing_su" value="{{$closing_su->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$mo+=1}} closing_mo" value="{{$closing_mo->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$tu+=1}} closing_tu" value="{{$closing_tu->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$we+=1}} closing_we" value="{{$closing_we->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$th+=1}} closing_th" value="{{$closing_th->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$fr+=1}} closing_fr" value="{{$closing_fr->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$sa+=1}} closing_sa" value="{{$closing_sa->where('product_id', $product->id)->count()}}" hidden/>

                                            <input id="product {{$n+=1}}" value="{{$product->name}}" hidden/>
                                        @endforeach
										<!--end::Body-->
									</label>
									<!--end::Statistics Widget 5-->
