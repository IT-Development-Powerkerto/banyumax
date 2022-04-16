
									<!--begin::Statistics Widget 5-->
									<label class="card card-xl-stretch mb-5 mb-xl-8 bg-white">
										<!--begin::Body-->
										<div class="card-body rounded shadow-sm" style="color:#1961A6; border:1px solid #1961A6">
											<div class="fw-bold fs-3 mb-2 mt-5">Upselling</div>
											<div class="fw-bolder fs-3hx mt-n2">{{ ($closing_count == 0) ? 0 : round($quantity / $closing_count, 1) }}</div>
										</div>
                                        <?php
                                            $n=0;
                                            $week1=0;
                                            $week2=0;
                                            $week3=0;
                                            $week4=0;
                                        ?>
                                        @foreach ($products as $product)
                                            {{-- <input id="{{$product->name}}" value="{{$inputer->where('product_name', $product->name)->sum('total_price') - $inputer->where('product_name', $product->name)->sum('product_promotion')}}" hidden/> --}}
                                            <input id="{{$week1+=1}} closing_week1" value="{{$closing_week1->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$week2+=1}} closing_week2" value="{{$closing_week2->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$week3+=1}} closing_week3" value="{{$closing_week3->where('product_id', $product->id)->count()}}" hidden/>
                                            <input id="{{$week4+=1}} closing_week4" value="{{$closing_week4->where('product_id', $product->id)->count()}}" hidden/>

                                            <input id="product {{$n+=1}}" value="{{$product->name}}" hidden/>
                                        @endforeach
										<!--end::Body-->
									</label>
									<!--end::Statistics Widget 5-->
