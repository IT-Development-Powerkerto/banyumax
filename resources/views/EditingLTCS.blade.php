<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Edit Lead Tunelling</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		{{--  <meta name="csrf-token" content="{{ csrf_token() }}">  --}}
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link rel="icon" href="../img/favicon.png">
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<!-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> -->
		<link href="{{ URL::asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!-- <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" /> -->
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						@include('layout/header/_baseCS')
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0 mt-n3">Edit Lead Tunelling</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<form class="form" action="{{ route('lead.update',['lead' => $lead->id]) }}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PATCH')
										<div class="card-body">
											<h1 class="pb-5">Data CS</h1>
										 	<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Advertise</label>
												<div class="col-lg-3">
													<div class="input-group">
														<label type="text" class="form-control" placeholder="Full name">{{ old('advertiser') ?? $lead->advertiser }}</label>
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-users-cog" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Advertise Name</span>
										  		</div>
												<label class="col-lg-1 col-form-label text-lg-right">Operator</label>
												<div class="col-lg-3">
													<div class="input-group">
														<label type="text" class="form-control" placeholder="your name">{{ old('operator') ?? $lead->operator->name }}</label>
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled CS Name</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Status</label>
												<div class="col-lg-3">
													<div class="input-group">
														<select class="form-control" name="status_id" id='status_id'>
															<option value="3" {{ $lead->status_id  == '3' ? 'selected': '' }} required>Waiting</option>
															<option value="4" {{ $lead->status_id  == '4' ? 'selected': '' }} required>Proccessing</option>
															<option value="5" {{ $lead->status_id  == '5' ? 'selected': '' }} required>Closing</option>
															<option value="6" {{ $lead->status_id  == '6' ? 'selected': '' }} required>Spam</option>
															<option value="7" {{ $lead->status_id  == '7' ? 'selected': '' }} required>Failed</option>
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-angle-down" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please Select Status</span>
												</div>
											</div>

											<div class="separator separator-dashed my-10"></div>

											<h1 class="pb-5">Data Order</h1>
											<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Full Name</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $lead->client_name }}" placeholder="Full name"/>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-user-friends" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter your full name</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Contact</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" name="whatsapp" id="whatsapp" class="form-control" value="{{ old('whatsapp') ?? $lead->client_whatsapp }}" placeholder="Enter contact number"/>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-phone" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter Customer contact</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Address</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="text" name="address" maxlength="250" id="address" class="form-control" value="{{ (old('address') ?? ($lead->inputer->customer_address ?? '')) }}" placeholder="Enter your address"/>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please enter your address</span>
												</div>
												{{-- <label class="col-lg-1 col-form-label text-lg-right mt-10">Inputer</label>
												<div class="col-lg-3 mt-10">
													<div class="input-group">
														<select class="form-control" name="inputer_id" id="inputer_id">
															@foreach ($user_inputers as $user_inputer)
															<option value="{{ $user_inputer->id }}">{{ $user_inputer->name }}</option>
															@endforeach
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-user" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select your inputer name</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-10">Sale Type</label>
												<div class="col-lg-3 mt-10">
													<div class="input-group">
														<select class="form-control" name="sale_type" id="sale_type">
															<option value="new customer" required>New Customer</option>
															<option value="resending" required>Resending</option>
															<option value="send less" required>Send Less</option>
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-user" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select your sale type</span>
												</div> --}}
											</div>
										 	<div class="separator separator-dashed my-10"></div>

											{{--  <div id="kt_repeater_1">  --}}
												{{--  <div id="kt_repeater_1" data-repeater-list="" >  --}}
													<div class="form-group row mt-3">
														<label class="col-lg-1 col-form-label text-lg-right">Product</label>
														<div class="col-lg-3">
															<div class="input-group">
																<select class="form-control" name="product_name" id="product_name">
																	@foreach ($products as $product)
																	<option value="{{ $product->name }}" {{ $product->name == $lead->product->name ? 'selected':''}}>{{ $product->name }}</option>
																	@endforeach
																</select>
																{{-- <label type="text"class="form-control" id="product" placeholder="Product Name">{{ old('product_name') ?? $lead->implode('product_name') }}</label> --}}
																<div class="input-group-append"><span class="input-group-text"><i class="las la-box" style="font-size: 24px"></i></span></div>
															</div>
															<span class="form-text text-muted">Auto-Filled Product Name</span>
														</div>
														<label class="col-lg-1 col-form-label text-lg-right">Quantity</label>
														<div class="col-lg-3">
															<div class="input-group">
																<input type="number" placeholder="Quantity Product" min="0"  id="quantity" name="quantity" value="{{ old('quantity') ?? ($lead->quantity ?? 0)}}" id="inputquantity" class="form-control" aria-describedby="quantityHelpInline"/>
																<div class="input-group-append"><span class="input-group-text"><i class="las la-boxes" style="font-size: 24px"></i></span></div>
															</div>
															<span class="form-text text-muted">Please enter quantity</span>
														</div>
														<label class="col-lg-1 col-form-label text-lg-right">Price</label>
														<div class="col-lg-3">
															<div class="input-group">
																<input type="number" placeholder="Enter price" min="0" id="price" name="price" value="{{ old('price') ?? $lead->price }}" id="inputprice" class="form-control" aria-describedby="priceHelpInline"/>
																<div class="input-group-append"><span class="input-group-text"><i class="las la-money-bill-wave" style="font-size: 24px"></i></span></div>
															</div>
															<span class="form-text text-muted">Please enter price</span>
														</div>
														<label class="col-lg-1 col-form-label text-lg-right mt-8">Promotion Product</label>
														<div class="col-lg-3 mt-8">
															<div class="input-group">
																<select class="form-control" name="product_promotion_id" id="product_promotion_id">
																	<option hidden>Select Promotion</option>
                                                                    @if ($lead->inputer == null)
                                                                        <option value="">Not Have Promotion</option>
                                                                        @foreach ($product_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                        <option value="{{$promotion->id}}">{{ $promotion->promotion_name }}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" {{ $lead->inputer->product_promotion_id == null ? 'selected': ''}}>Not Have Promotion</option>
                                                                        @foreach ($product_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                        <option value="{{$promotion->id}}" {{ $lead->inputer->product_promotion_id == $promotion->id ? 'selected': ''}}>{{ $promotion->promotion_name }}</option>
                                                                        @endforeach
                                                                    @endif
																</select>
																<div class="input-group-append"><span class="input-group-text"><i class="las la-percent" style="font-size: 24px"></i></span></div>
															</div>
															<span class="form-text text-muted">Please enter promotion type</span>
														</div>


														<label class="col-lg-1 col-form-label text-lg-right mt-8">Additional Promotion Product</label>
														<div class="col-lg-3 mt-8">
															<div class="input-group">
																<select class="form-control" name="add_product_promotion_id" id="add_product_promotion_id">
																	<option hidden>Select Promotion</option>
                                                                    @if ($lead->inputer == null)
                                                                        <option value="">Not Have Promotion</option>
                                                                        @foreach ($product_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                        <option value="{{$promotion->id}}">{{ $promotion->promotion_name }}</option>
                                                                        @endforeach
                                                                    @else
                                                                        <option value="" {{ $lead->inputer->add_product_promotion_id == null ? 'selected': ''}}>Not Have Promotion</option>
                                                                        @foreach ($product_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                        <option value="{{$promotion->id}}" {{ $lead->inputer->add_product_promotion_id == $promotion->id ? 'selected': ''}}>{{ $promotion->promotion_name }}</option>
                                                                        @endforeach
                                                                    @endif
																</select>
																<div class="input-group-append"><span class="input-group-text"><i class="las la-percent" style="font-size: 24px"></i></span></div>
															</div>
															<span class="form-text text-muted">Please enter promotion type</span>
														</div>

														<label class="col-lg-1 col-form-label text-lg-right mt-8">Product Promotion</label>
														<div class="col-lg-3 mt-8">
															<div class="input-group">
																<input type="number" value="{{ $lead->inputer->product_promotion ?? 0 }}" name="product_promotion" id="product_promotion"  class="form-control" placeholder="Promotion Price" readonly/>
																<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
															</div>
															<span class="form-text text-muted">Auto-Filled Promotion Price</span>
														</div>
														<label class="col-lg-1 col-form-label text-lg-right mt-8">Total Price</label>
														<div class="col-lg mt-8">
															<div class="input-group">
																<input type="number" value="{{ $lead->inputer->total_price ?? 0 }}" name="total_price" id="total_price" class="form-control" placeholder="Total Price" readonly/>
																<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
															</div>
															<span class="form-text text-muted">Auto-Filled Total</span>
														</div>
														{{-- <div class="d-flex justify-content-end mt-5 pb-5">
															<a href="javascript:;" data-repeater-delete class="btn btn-sm font-weight-bolder btn-light-danger">
																<i class="la la-trash"></i>delete
															</a>
														</div> --}}
													</div>
												{{--  </div>  --}}
												{{-- <div class="d-flex justify-content-end">
													<a href="javascript:;" data-repeater-create class="btn btn-sm font-weight-bolder btn-light-primary" style="width: 90px;">
														<i class="la la-plus"></i>Add
													</a>
												</div> --}}
											{{--  </div>  --}}


										 	<div class="separator separator-dashed my-10"></div>
										 	<div class="form-group row">

												<label class="col-lg-1 col-form-label text-lg-right">Weight (gram)</label>
												<div class="col-lg-3">
													<div class="input-group">
														<input type="number" class="form-control" value="{{ (old('product_weight') ?? ($lead->inputer->product_weight ?? 0))}}" name="weight" id="weight" placeholder="Weight" />
														<div class="input-group-append"><span class="input-group-text"><i class="las la-weight-hanging" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please input the product wieght</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Warehouse</label>
												<div class="col-lg-3">
													<div class="input-group">
                                                        @if ($lead->inputer == null)
                                                            <select class="form-control" name="warehouse" id="warehouse" >
                                                                <option value="" hidden>Warehouse</option>
                                                                <option value="Cilacap" required>Cilacap</option>
                                                                <option value="Kosambi" required>Kosambi</option>
                                                                <option value="Tandes.Sby" required>Tandes.Sby</option>
                                                            </select>

                                                        @else
                                                            <select class="form-control" name="warehouse" id="warehouse" >
                                                                <option value="" hidden>Warehouse</option>
                                                                <option value="Cilacap" {{ (old('warehouse') ?? $lead->inputer->warehouse ) == 'Cilacap' ? 'selected': '' }} required>Cilacap</option>
                                                                <option value="Kosambi" {{ (old('warehouse') ?? $lead->inputer->warehouse ) == 'Kosambi' ? 'selected': '' }} required>Kosambi</option>
                                                                <option value="Tandes.Sby" {{ (old('warehouse') ?? $lead->inputer->warehouse ) == 'Tandes.Sby' ? 'selected': '' }} required>Tandes.Sby</option>
                                                            </select>

                                                        @endif
														<div class="input-group-append"><span class="input-group-text"><i class="las la-warehouse" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an warehouse</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right">Destination Province</label>
												<div class="col-lg-3">
													<div class="input-group">
														<select class="form-control" id="province_id" name="province_id" >
															<option value="" hidden>Destination Province</option>
                                                            @if ($lead->inputer == null)
                                                                @foreach ($all_province as $all_province)
                                                                    <option value="{{ $all_province['province_id'] }}">{{ $all_province['province'] }}</option>
                                                                @endforeach

                                                            @else
                                                                @foreach ($all_province as $all_province)
                                                                    <option value="{{ $all_province['province_id'] }}" {{ $lead->inputer->province_id == $all_province['province_id'] ? 'selected': ''}}>{{ $all_province['province'] }}</option>
                                                                @endforeach
                                                            @endif
														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an destination province</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Destination City</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" id="city_id" name="city_id" >
															<option value="" hidden>Destination City</option>
															@isset($all_city)
															@foreach ($all_city as $all_city)
															<option value="{{ $all_city['city_id'] }}" {{ $lead->inputer->city_id == $all_city['city_id'] ? 'selected': ''}}>{{ $all_city['type'] }} {{ $all_city['city_name'] }}</option>
															@endforeach

															@endisset

														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an destination city</span>
												</div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Destination Subdistrict</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<select class="form-control" id="subdistrict_id" name="subdistrict_id">
															<option value="" hidden>Destination Subdistrict</option>
															@isset($all_subdistrict)

																@foreach ($all_subdistrict as $all_subdistrict)
																<option value="{{ $all_subdistrict['subdistrict_id'] }}" {{ $lead->inputer->subdistrict_id == $all_subdistrict['subdistrict_id'] ? 'selected': ''}}>{{ $all_subdistrict['subdistrict_name'] }}</option>
																@endforeach
															@endisset

														</select>
														<div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Please select an destination subdistrict</span>
												</div>
                                                <label class="col-lg-1 col-form-label text-lg-right mt-8">Payment</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
                                                        @if ($lead->inputer == null)

														<select class="form-control" name="payment_method" id="payment_method">
															<option value="" hidden>Payment Method</option>
															<option value="COD" required>COD</option>
															<option value="Transfer" required>Transfer</option>
														</select>
                                                        @else

														<select class="form-control" value="{{ old('payment_method') ?? $lead->inputer->payment_method }}" name="payment_method" id="payment_method">
															<option value="" hidden>Payment Method</option>
															<option value="COD" {{ (old('payment_method') ?? $lead->inputer->payment_method ) == 'COD' ? 'selected': '' }} required>COD</option>
															<option value="Transfer" {{ (old('payment_method') ?? $lead->inputer->payment_method ) == 'Transfer' ? 'selected': '' }} required>Transfer</option>
														</select>
                                                        @endif
														<div class="input-group-append"><span class="input-group-text"><i class="las la-file-invoice-dollar" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Select an payment method.</span>
											  	</div>
										  		<label class="col-lg-1 col-form-label text-lg-right mt-8">Courier</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
                                                        @if ($lead->inputer == null)

														<select class="form-control" name="courier" id="courier">
															<option value="" hidden>Courier Type</option>
															<option value="POS" required>POS</option>
															<option value="JNE OKE"  required>JNE OKE</option>
															<option value="JNE REG" required>JNE REG</option>
															<option value="JNT" required>JNT</option>
															<option value="Ninja" required>Ninja</option>
															<option value="Sicepat" required>Sicepat</option>
														</select>
                                                        @else

														<select class="form-control" value="{{ old('courier') ?? $lead->inputer->courier }}" name="courier" id="courier">
															<option value="" hidden>Courier Type</option>
															<option value="POS" {{ (old('courier') ?? $lead->inputer->courier ) == 'POS' ? 'selected': '' }} required>POS</option>
															<option value="JNE OKE" {{ (old('courier') ?? $lead->inputer->courier ) == 'JNE OKE' ? 'selected': '' }} required>JNE OKE</option>
															<option value="JNE REG" {{ (old('courier') ?? $lead->inputer->courier ) == 'JNE REG' ? 'selected': '' }} required>JNE REG</option>
															<option value="JNT" {{ (old('courier') ?? $lead->inputer->courier ) == 'JNT' ? 'selected': '' }} required>JNT</option>
															<option value="Ninja" {{ (old('courier') ?? $lead->inputer->courier ) == 'Ninja' ? 'selected': '' }} required>Ninja</option>
															<option value="Sicepat" {{ (old('courier') ?? $lead->inputer->courier ) == 'Sicepat' ? 'selected': '' }} required>Sicepat</option>
														</select>
                                                        @endif
														<div class="input-group-append"><span class="input-group-text"><i class="las la-truck-moving" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">JNE OKE & JNE REG not available for COD payment.</span>
											  	</div>

                                                <label class="col-lg-1 col-form-label text-lg-right mt-8">Shipping Price</label>
                                                <div class="col-lg-3 mt-8">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="Shipping Price" id="shipping_price" name="shipping_price" value="{{ $lead->inputer->shipping_price ?? '' }}" readonly>
                                                        <div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
                                                    </div>
                                                    <span class="form-text text-muted">Auto-Filled Total</span>
                                                </div>

                                                <label class="col-lg-1 col-form-label text-lg-right mt-8">Promotion Shipping</label>
                                                <div class="col-lg-3 mt-8">
                                                    <div class="input-group">
                                                        <select class="form-control" name="shipping_promotion_id" id="shipping_promotion_id">
                                                            <option hidden>Select Promotion</option>
                                                            @if ($lead->inputer == null)
                                                                <option value="">Not Have Promotion</option>
                                                                @foreach ($shipping_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                <option value="{{$promotion->id}}">{{ $promotion->promotion_name }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="" {{ $lead->inputer->shipping_promotion_id == null ? 'selected': ''}}>Not Have Promotion</option>
                                                                @foreach ($shipping_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                <option value="{{$promotion->id}}" {{ $lead->inputer->shipping_promotion_id == $promotion->id ? 'selected': ''}}>{{ $promotion->promotion_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <div class="input-group-append"><span class="input-group-text"><i class="las la-percent" style="font-size: 24px"></i></span></div>
                                                    </div>
                                                    <span class="form-text text-muted">Please enter promotion type</span>
                                                </div>
                                                <label class="col-lg-1 col-form-label text-lg-right mt-8">Additional Promotion Shipping</label>
                                                <div class="col-lg-3 mt-8">
                                                    <div class="input-group">
                                                        <select class="form-control" name="add_shipping_promotion_id" id="add_shipping_promotion_id">
                                                            <option hidden>Select Promotion</option>
                                                            @if ($lead->inputer == null)
                                                                <option value="">Not Have Promotion</option>
                                                                @foreach ($shipping_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                <option value="{{$promotion->id}}">{{ $promotion->promotion_name }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="" {{ $lead->inputer->add_shipping_promotion_id == null ? 'selected': ''}}>Not Have Promotion</option>
                                                                @foreach ($shipping_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                <option value="{{$promotion->id}}" {{ $lead->inputer->add_shipping_promotion_id == $promotion->id ? 'selected': ''}}>{{ $promotion->promotion_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <div class="input-group-append"><span class="input-group-text"><i class="las la-percent" style="font-size: 24px"></i></span></div>
                                                    </div>
                                                    <span class="form-text text-muted">Please enter promotion type</span>
                                                </div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Shipping Promotion</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<input type="number" class="form-control" placeholder="Shipping Promotion" id="shipping_promotion" name="shipping_promotion" value="{{ $lead->inputer->shipping_promotion ?? 0 }}" readonly>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Total</span>
												</div>
                                                <label class="col-lg-1 col-form-label text-lg-right mt-8">Total Shipping Price</label>
                                                <div class="col-lg-3 mt-8">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="Total Shipping Price" id="total_shipping" name="total_shipping" value="{{ $lead->inputer->total_shipping ?? 0}}" readonly>
                                                        <div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
                                                    </div>
                                                    <span class="form-text text-muted">Auto-Filled Total</span>
                                                </div>

										 	</div>
											 <div class="separator separator-dashed my-10"></div>
											<div class="form-group row">
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Shipping Admin Cost</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<input type="number" class="form-control" placeholder="Shipping Admin" id="shipping_admin" name="shipping_admin" value="{{ $lead->inputer->shipping_admin ?? 0 }}" readonly>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Total</span>
												</div>
                                                <label class="col-lg-1 col-form-label text-lg-right mt-8">Promotion Admin</label>
                                                <div class="col-lg-3 mt-8">
                                                    <div class="input-group">
                                                        <select class="form-control" name="admin_promotion_id" id="admin_promotion_id">
                                                            <option hidden>Select Promotion</option>
                                                            @if ($lead->inputer == null)
                                                                <option value="">Not Have Promotion</option>
                                                                @foreach ($admin_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                <option value="{{$promotion->id}}">{{ $promotion->promotion_name }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="" {{ $lead->inputer->admin_promotion_id == null ? 'selected': ''}}>Not Have Promotion</option>
                                                                @foreach ($admin_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                <option value="{{$promotion->id}}" {{ $lead->inputer->admin_promotion_id == $promotion->id ? 'selected': ''}}>{{ $promotion->promotion_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <div class="input-group-append"><span class="input-group-text"><i class="las la-percent" style="font-size: 24px"></i></span></div>
                                                    </div>
                                                    <span class="form-text text-muted">Please enter promotion type</span>
                                                </div>
                                                <label class="col-lg-1 col-form-label text-lg-right mt-8">Additional Promotion Admin</label>
                                                <div class="col-lg-3 mt-8">
                                                    <div class="input-group">
                                                        <select class="form-control" name="add_admin_promotion_id" id="add_admin_promotion_id">
                                                            <option hidden>Select Promotion</option>
                                                            @if ($lead->inputer == null)
                                                                <option value="">Not Have Promotion</option>
                                                                @foreach ($admin_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                <option value="{{$promotion->id}}">{{ $promotion->promotion_name }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="" {{ $lead->inputer->add_admin_promotion_id == null ? 'selected': ''}}>Not Have Promotion</option>
                                                                @foreach ($admin_promotion->where('product_name', $lead->product->name) as $promotion)
                                                                <option value="{{$promotion->id}}" {{ $lead->inputer->add_admin_promotion_id == $promotion->id ? 'selected': ''}}>{{ $promotion->promotion_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <div class="input-group-append"><span class="input-group-text"><i class="las la-percent" style="font-size: 24px"></i></span></div>
                                                    </div>
                                                    <span class="form-text text-muted">Please enter promotion type</span>
                                                </div>
												<label class="col-lg-1 col-form-label text-lg-right mt-8">Promotion Admin Cost</label>
												<div class="col-lg-3 mt-8">
													<div class="input-group">
														<input type="number" class="form-control" placeholder="Promotion Admin" id="admin_promotion" name="admin_promotion" value="{{ $lead->inputer->admin_promotion ?? 0 }}">
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Input Promotion</span>
												</div>
                                                <label class="col-lg-1 col-form-label text-lg-right mt-8">Total Admin Cost</label>
												<div class="col-lg-7 mt-8">
													<div class="input-group">
														<input type="number" class="form-control" placeholder="Total Admin" id="total_admin" name="total_admin" value="{{ $lead->inputer->total_admin ?? 0 }}" readonly>
														<div class="input-group-append"><span class="input-group-text"><i class="las la-equals" style="font-size: 24px"></i></span></div>
													</div>
													<span class="form-text text-muted">Auto-Filled Total</span>
												</div>
										 	</div>
											<div class="separator separator-dashed my-10"></div>
											<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Grand Total</label>
												<div class="col-lg">
													<input name="total_payment" id="total_payment" class="form-control" placeholder="Total Payment" value="{{ $lead->inputer->total_payment ?? 0 }}" readonly>
													<span class="form-text text-muted">Total Price + Courier</span>
												</div>
											</div>
											<div class="form-group row mt-3">
												<label class="col-lg-1 col-form-label text-lg-right">Upload The Proof</label>
												<div class="col-lg">
													<input class="form-control" type="file" id="image" name="image" id="formFileMultiple" multiple id>
													<span class="form-text text-muted">Please upload the proof if you closing</span>
												</div>
											</div>

										</div>
										<div class="card-footer">
											<div class="row">
												<div class="d-flex justify-content-between">
													<div>
														<button class="btn btn-success" id="copy">Copy to Clipboard</button>
													</div>
													<div>
														<input id="submit" type="submit" class="btn btn-primary" value="Save">
														<a type="button" class="btn btn-secondary" href="/dashboard">Cancel</a>
													</div>
												</div>
											</div>
										</div>
										<input type="number" name="ori_product_promotion" id="ori_product_promotion" value="" hidden>
										<input type="number" name="ori_shipping_promotion" id="ori_shipping_promotion" value="" hidden>
										<input type="number" name="ori_admin_promotion" id="ori_admin_promotion" value="" hidden>
										<input type="number" name="add_product_promotion" id="add_product_promotion" value="{{ $lead->inputer->add_product_promotion ?? 0}}" hidden>
										<input type="number" name="add_shipping_promotion" id="add_shipping_promotion" value="{{ $lead->inputer->add_product_promotion ?? 0}}" hidden>
										<input type="number" name="add_admin_promotion" id="add_admin_promotion" value="{{ $lead->inputer->add_product_promotion ?? 0}}" hidden>
										{{-- <input type="number" name="total_shipping" id="total_shipping" value="{{ $lead->inputer->add_product_promotion ?? 0}}" hidden> --}}
									</form>
									<textarea id="clipboard" cols="30" rows="10"></textarea>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Page-->
				@include('layout/_footer')
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script>
			var hostUrl = "../assets/";
		</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../assets/plugins/global/plugins.bundle.js"></script>
		<script src="../assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="../assets/js/custom/apps/customers/list/export.js"></script>
		<script src="../assets/js/custom/apps/customers/list/leads.js"></script>
		<script src="../assets/js/custom/apps/customers/add.js"></script>
		<script src="../assets/js/custom/widgets.js"></script>
		<script src="../assets/js/custom/apps/chat/chat.js"></script>
		<script src="../assets/js/custom/modals/create-app.js"></script>
		<script src="../assets/js/custom/modals/upgrade-plan.js"></script>
		<script src="../assets/js/custom/intro.js"></script>
		<script src="../assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
		<script>
			// Class definition
			var KTFormRepeater = function() {

			// Private functions
			var demo1 = function() {
				$('#kt_repeater_1').repeater({
					initEmpty: false,

					defaultValues: {
						'text-input': 'foo'
					},

					show: function () {
						$(this).slideDown();
					},

					hide: function (deleteElement) {
						$(this).slideUp(deleteElement);
					}
				});
			}

			return {
				// public functions
				init: function() {
					demo1();
				}
			};
			}();

			jQuery(document).ready(function() {
			KTFormRepeater.init();
			});
		</script>
		<script>
			$(document).ready(function(){
				$('#province_id').on('change', function(){
					let province_id = $(this).val();
					if(province_id){
						$.ajax({
							url: "/city/"+province_id,
							type: 'GET',
							dataType: 'json',
							success: function(data){
								$('#city_id').empty();
								$.each(data, function(key, value){
									$('#city_id').append('<option value="'+value.city_id+'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
								});
							}
						});
					}else {
						$('#city_id').empty();
					}
				});
			});

		</script>
		<script>
			$(document).ready(function(){
				$('#city_id').on('change', function(){
					let city_id = $(this).val();
					if(city_id){
						$.ajax({
							url: "/subdistrict/"+city_id,
							type: 'GET',
							dataType: 'json',
							success: function(data){
								$('#subdistrict_id').empty();
								$.each(data, function(key, value){
									$('#subdistrict_id').append('<option value="'+value.subdistrict_id+'">' + value.subdistrict_name + '</option>');
								});
							}
						});
					}else {
						$('#subdistrict_id').empty();
					}
				});
			});
		</script>
		<script src="../assets/js/cek-ongkir.js"></script>
		<script src="../assets/js/promo.js"></script>
		<script src="../assets/js/get-promotion-list.js"></script>
		<script>
			$(function(){
				$("#clipboard").hide();
				$('#copy').click(function(){
				    var name = $('#name').val();
                    var address = $('#address').val();
                    var province = $('#province_id').find(":selected").text();
                    var city = $('#city').find(":selected").text();
                    var subdistrict = $('#subdistrict_id').find(":selected").text();
                    var whatsapp = $('#whatsapp').val();
                    var quantity = $('#quantity').val();
                    var price = parseInt($('#price').val());
                    var product_promotion_id = $('#product_promotion_id').val();
                    var shipping_promotion_id = $('#shipping_promotion_id').val();
                    var admin_promotion_id = $('#admin_promotion_id').val();
                    var add_product_promotion_id = $('#add_product_promotion_id').val();
                    var add_shipping_promotion_id = $('#add_shipping_promotion_id').val();
                    var add_admin_promotion_id = $('#add_admin_promotion_id').val();
                    var shipping_price = parseInt($('#shipping_price').val());
                    var payment_method = $('#payment_method').val();
                    var courier = $('#courier').val();
                    var product = $('#product_name').find(":selected").text();
                    var province_id = $('#province_id').find(":selected").val();
                    var ongkir = parseInt(shipping_price);
                    var total_price = (parseInt(price) * parseInt(quantity));
                    var promo_product = parseInt($("#product_promotion").val());
                    var add_promo_product = parseInt($("#add_product_promotion").val());
                    var promo_ongkir = parseInt($("#shipping_promotion").val());
                    var add_promo_ongkir = parseInt($("#add_shipping_promotion").val());
                    var promo_admin = parseInt($("#admin_promotion").val());
                    var add_promo_admin = parseInt($("#add_admin_promotion").val());
                    var admin = parseInt($('#shipping_admin').val());
                    var total_payment = parseInt($('#total_payment').val());
                    var text = `Nama Pemesan: ${name}\nAlamat: ${address}\nProvinsi: ${province}\nKota/Kabupaten: ${city}\nKecamatan: ${subdistrict}\nNo. Tlp: ${whatsapp}\nProduk yang dipesan: ${product}\nJumlah Pesanan: ${quantity}\nKurir: ${courier}\nMetode: ${payment_method}\nPromo Produk: ${promo_product} (promo produk) + ${add_promo_product} (tambahan promo produk) = ${promo_product+add_promo_product}\nPromo Ongkir: ${promo_ongkir} (potongan ongkir) + ${add_promo_ongkir} (tambahan promo ongkir) = ${promo_ongkir+add_promo_ongkir}\nPromo Admin COD: ${promo_admin} (promo biaya admin COD) + ${add_promo_admin} (tambahan promo biaya admin COD) = ${promo_admin+add_promo_admin}\nTotal Pembayaran: ${price*quantity} - ${promo_product+add_promo_product} (promo produk) + ${ongkir} (ongkir) - ${promo_admin+add_promo_admin} (potongan ongkir) + ${admin} (biaya admin COD) - ${promo_admin+add_promo_admin} (promo biaya admin COD) = ${total_payment}`;
					$("#clipboard").val(text);
					$("#clipboard").show().select();
					document.execCommand("copy");
					$("#clipboard").hide();
					alert('Copied to clipboard');
					return false;
				});
			});
		</script>
        <script>
            $(document).ready(function(){
                $('#status_id, #address, #name, #whatsapp, #quantity, #weight').on('change', function(){
                    if($('#status_id').val() == 5){
                        if($('#address').val() == ""){
                            document.getElementById("address").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("address").setAttribute('class', 'form-control');
                        }
                        if($('#name').val() == ""){
                            document.getElementById("name").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("name").setAttribute('class', 'form-control');
                        }
                        if($('#whatsapp').val() == ""){
                            document.getElementById("whatsapp").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("whatsapp").setAttribute('class', 'form-control');
                        }
                        if($('#quantity').val() == ""){
                            document.getElementById("quantity").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("quantity").setAttribute('class', 'form-control');
                        }
                        if($('#weight').val() == ""){
                            document.getElementById("weight").setAttribute('class', 'form-control is-invalid');
                        }else {
                            document.getElementById("weight").setAttribute('class', 'form-control');
                        }
                    }
                });
            });
        </script>
		{{--  <script>
			$(document).ready(function(){
				var weight = $("#weight").val();
					var warehouse = $("#warehouse").val();
					var province = $("#province").val();
					var city = $("#city").val();
					var subdistrict = $("#subdistrict").val();
					var	courier = $("#courier").val();
					var courier = courier.toLowerCase();
					var shipping_promotion = $('#shipping_promotion').val();
				$('#total_price, #shipping_promotion, #shipping_price, #promotion_id').on('change', function(){
					var total_price = $('#total_price').val();
					var shipping_price = $('#shipping_price').val();

					$.ajax({
						type: 'GET',
						url: "{{ route('ongkir') }}",
						data: {'origin': origin, 'destination': subdistrict, 'weight': weight, 'courier': courier},
						dataType: 'json',
						success: function(data){
							var total_shipping_price = data-shipping_promotion;
							if(total_shipping_price <= 0){
								shipping_price.value = 0;
							}else{
								shipping_price.value = total_shipping_price;
							}
						}
					});
					var total_payment = parseInt(total_price) + parseInt(shipping_price);
					$('#total_payment').val(total_payment);
				});
			});
		</script>  --}}
		<script>
			// Class definition
			var KTSelect2 = function() {
			// Private functions
			var demos = function() {
			// basic
			$('#kt_select2_1').select2({
			placeholder: "Select a state"
			});

			// nested
			$('#kt_select2_2').select2({
			placeholder: "Select a state"
			});

			// multi select
			$('#kt_select2_3').select2({
			placeholder: "Select a state",
			});

			// basic
			$('#kt_select2_4').select2({
			placeholder: "Select a state",
			allowClear: true
			});

			// loading data from array
			var data = [{
			id: 0,
			text: 'Enhancement'
			}, {
			id: 1,
			text: 'Bug'
			}, {
			id: 2,
			text: 'Duplicate'
			}, {
			id: 3,
			text: 'Invalid'
			}, {
			id: 4,
			text: 'Wontfix'
			}];

			$('#kt_select2_5').select2({
			placeholder: "Select a value",
			data: data
			});

			// loading remote data

			function formatRepo(repo) {
			if (repo.loading) return repo.text;
			var markup = "<div class='select2-result-repository clearfix'>" +
				"<div class='select2-result-repository__meta'>" +
				"<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
			if (repo.description) {
				markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
			}
			markup += "<div class='select2-result-repository__statistics'>" +
				"<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
				"<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
				"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
				"</div>" +
				"</div></div>";
			return markup;
			}

			function formatRepoSelection(repo) {
			return repo.full_name || repo.text;
			}

			$("#kt_select2_6").select2({
			placeholder: "Search for git repositories",
			allowClear: true,
			ajax: {
				url: "https://api.github.com/search/repositories",
				dataType: 'json',
				delay: 250,
				data: function(params) {
				return {
				q: params.term, // search term
				page: params.page
				};
				},
				processResults: function(data, params) {
				// parse the results into the format expected by Select2
				// since we are using custom formatting functions we do not need to
				// alter the remote JSON data, except to indicate that infinite
				// scrolling can be used
				params.page = params.page || 1;

				return {
				results: data.items,
				pagination: {
				more: (params.page * 30) < data.total_count
				}
				};
				},
				cache: true
			},
			escapeMarkup: function(markup) {
				return markup;
			}, // let our custom formatter work
			minimumInputLength: 1,
			templateResult: formatRepo, // omitted for brevity, see the source of this page
			templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
			});

			// custom styles

			// tagging support
			$('#kt_select2_12_1, #kt_select2_12_2, #kt_select2_12_3, #kt_select2_12_4').select2({
			placeholder: "Select an option",
			});

			// disabled mode
			$('#kt_select2_7').select2({
			placeholder: "Select an option"
			});

			// disabled results
			$('#kt_select2_8').select2({
			placeholder: "Select an option"
			});

			// limiting the number of selections
			$('#kt_select2_9').select2({
			placeholder: "Select an option",
			maximumSelectionLength: 2
			});

			// hiding the search box
			$('#kt_select2_10').select2({
			placeholder: "Select an option",
			minimumResultsForSearch: Infinity
			});

			// tagging support
			$('#kt_select2_11').select2({
			placeholder: "Your Destination",
			tags: true
			});

			// disabled results
			$('.kt-select2-general').select2({
			placeholder: "Select an option"
			});
			}

			var modalDemos = function() {
			$('#kt_select2_modal').on('shown.bs.modal', function () {
			// basic
			$('#kt_select2_1_modal').select2({
				placeholder: "Select a state"
			});

			// nested
			$('#kt_select2_2_modal').select2({
				placeholder: "Select a state"
			});

			// multi select
			$('#kt_select2_3_modal').select2({
				placeholder: "Select a state",
			});

			// basic
			$('#kt_select2_4_modal').select2({
				placeholder: "Select a state",
				allowClear: true
			});
			});
			}

			// Public functions
			return {
			init: function() {
			demos();
			modalDemos();
			}
			};
			}();

			// Initialization
			jQuery(document).ready(function() {
			KTSelect2.init();
			});
		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
