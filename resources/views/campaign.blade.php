<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../">
		<title>Campaign</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<link rel="icon" href="img/favicon.png">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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

						@include('layout/header/_base')

					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						@if(session()->has('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								{{ session('success') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif

						@if(session()->has('error'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								{{ session('error') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endif
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Tables Widget 11-->
							<div class="card card-xxl-stretch mb-5 mb-xl-8">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column mt-n3">
										<span class="card-label fw-bolder fs-3 mb-1">Campaign</span>
                                        @if (auth()->user()->role_id == 1)
                                            <span class="text-muted mt-1 fw-bold fs-7">{{$campaigns->count()}} Campaign</span>
                                        @else
                                            <span class="text-muted mt-1 fw-bold fs-7">{{$campaigns->where('user_id', auth()->user()->id)->count()}} Campaign</span>
                                        @endif
									</h3>
									<div class="card-toolbar mt-n3" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a Campaign">
										<a href="" data-bs-toggle="modal" data-bs-target="#create-campaign" class="btn btn-sm btn-light btn-active-primary">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-3">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->Create Campaign</a>
									</div>
									<div class="modal fade" tabindex="-1" id="create-campaign">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Campaign</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form action="{{route('campaign.store')}}" method="POST">
														@csrf

														<div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="inputtitle" class="col-form-label">Title</label>
															</div>
															<div class="col-10">
																<input type="text" name="title" value="" required id="inputtitle" class="form-control" aria-describedby="titleHelpInline">
															</div>
														</div>
                                                        <div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="inputRole" class="col-form-label">Product</label>
															</div>
															<div class="dropdown col-10">
																<select name="product_id" id="product_id" class="form-control">
																	@foreach ($products as $product)
																	<option value="{{$product->id}}" required>{{$product->name}}</option>
																	@endforeach
																</select>
															</div>
														</div>
                                                        {{-- <div class="row align-items-center col-12 pb-5">
															<div class="col-4">
																<label for="inputtkp" class="col-form-label">Tiktok Pixel</label>
															</div>
															<div class="col-8">
																<textarea type="text" name="tkp" required id="inputtkp" class="form-control" aria-describedby="tkpHelpInline"></textarea>
															</div>
														</div> --}}
														<div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="inputfbp" class="col-form-label">Facebook Pixel</label>
															</div>
															<div class="col-10">
																<textarea type="text" name="fbp" value="" required id="inputfbp" class="form-control" aria-describedby="fbpHelpInline"></textarea>
															</div>
														</div>
														<div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="inputRole" class="col-form-label">Facebook Event Form</label>
															</div>
															<div class="dropdown col-10">
																<select name="event_id" id="event_id" class="form-control">
																	@foreach ($events as $event)
																	<option value="{{$event->id}}" required>{{$event->name}}</option>
																	@endforeach
																</select>
															</div>
														</div>
														<div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="wa_event_id" class="col-form-label">Facebook Event WA</label>
															</div>
															<div class="dropdown col-10">
																<select name="event_wa" id="wa_event_id" class="form-control">
																	@foreach ($eventWa as $event)
																	<option value="{{$event->id}}" required>{{$event->name}}</option>
																	@endforeach
																</select>
															</div>
														</div>
														<div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="inputtp"  class="col-form-label">Thanks Page</label>
															</div>
															<div class="col-10">
																<textarea type="text" name="tp" required id="inputtp" class="form-control" aria-describedby="tpHelpInline"></textarea>
															</div>
														</div>
														<div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="inputat"  class="col-form-label">Customer to CS</label>
															</div>
															<div class="col-10">
																<textarea type="text" name="customer_to_cs" required id="inputat" class="form-control" aria-describedby="atHelpInline"></textarea>
															</div>
														</div>
														<div class="row align-items-center col-12 pb-5">
															<div class="col-2">
																<label for="inputat"  class="col-form-label">CS to Customer</label>
															</div>
															<div class="col-10">
																<textarea type="text" name="cs_to_customer" required id="inputat" class="form-control" aria-describedby="atHelpInline"></textarea>
															</div>
														</div>

														{{ csrf_field() }}
														<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Create">
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body py-3 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
									<!--begin::Table container-->
									<div class="table-responsive">
										<!--begin::Table-->
										<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
												<tr class="fw-bolder text-muted">
                                                <th class="min-w-50px">No</th>
													<th class="min-w-150px">Title</th>
													<th class="min-w-100px text-center">Operators</th>
													<th class="min-w-100px text-center">Leads</th>
													<th class="min-w-200px">Fp code</th>
													<th class="min-w-200px">WA code</th>
													<th class="min-w-200px">Tp code</th>
													<th class="min-w-200px text-end">Actions</th>
												</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
                                                @foreach ($campaigns as $campaign)
                                                <tr>
                                                    <td>
                                                        <label class="text-dark fw-bolder text-hover-primary d-block fs-6" >{{$loop->iteration}}</label>
                                                    </td>
                                                    <td>
                                                        <!-- <div class="d-flex align-items-center">
                                                            <label for="">WA Generosku</label>
                                                            <h1 class="text-dark fw-bolder text-hover-primary fs-6">https://mauorder.online/wa-generosku-2 </h1>
                                                        </div> -->
                                                        <div class="timeline-desc timeline-desc-light-primary mx-3">
                                                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$campaign->title}}</span>
                                                            <!-- <p class="fw-bolder pb-2">
                                                                https://mauorder.online/wa-generosku-2
                                                            </p> -->
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $campaign->operator->count() }}</label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $campaign->lead->count() }}</label>
                                                        {{-- <label class="text-primary fw-bolder d-block fs-6" alt="Facebook">{{$campaign->lead->count()}}</label>
                                                        <label class="text-success fw-bolder d-block fs-6" alt="Whatsapp">{{$campaign->lead->count()}}</label>
                                                        <label class="text-dark fw-bolder d-block fs-6" alt="Tiktok">{{$campaign->lead->count()}}</label> --}}
                                                    </td>
                                                    <td>
                                                        <textarea type="text" name="tp" id="inputtp" class="form-control" aria-describedby="tpHelpInline" >
<!doctype html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    @foreach (explode(',',$campaign->facebook_pixel) as $fp)
    fbq('init', '{{$fp}}');
    @endforeach
    fbq('track', 'PageView');
    </script>
    <noscript>
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?-ev=PageView&noscript=1"/>
    </noscript>

    <title></title>
</head>
<body>

    <div class="container">
        <form action="https://api.pwkbackoffice.com/public/api/lead/{{$campaign->id}}/{{$campaign->product_id}}" method="POST">
        <div class="mb-3" hidden>
                <label for="exampleInputNama" class="form-label">Campaign Id</label>
            <input type="number" name="campaign_id" value="{{$campaign->id}}" class="form-control" id="exampleInputNama" aria-describedby="namaHelp">
        </div>
        <div class="mb-3">
                <label for="exampleInputNama" class="form-label">Nama Lengkap</label>
            <input type="nama" name="name" class="form-control" id="exampleInputNama" aria-describedby="namaHelp">
        </div>
        <div class="mb-3">
                <label for="exampleInputWhatsapp" class="form-label">No. Whatsapp</label>
                <input type="text" name="whatsapp" class="form-control" id="exampleInputWhatsapp">
        </div>
        <i style="opacity: 50%">Banyumax.id</i>
        <div class="d-flex justify-content-center">
            <button id="submitForm" type="submit" class="btn btn-primary rounded-pill" onclick="{{$campaign->event_pixel->event_pixel}} alert('klik OK Dan Tunggu #NB: Jangan Klik Tombol Pesanan Lagi, Terima Kasih :)')">Submit</button>
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(function(){
        $('#submitForm').click(function(){
            $('#submitForm').attr('class', 'btn btn-primary rounded-pill disabled');
        });
    });
    </script>
</body>
</html>
                                                        </textarea>
                                                    </td>
                                                    <td>
                                                        <textarea type="text" name="wp" id="inputwp" class="form-control" aria-describedby="wpHelpInline" >
<!doctype html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title></title>
</head>
<body>

    <form action="https://api.pwkbackoffice.com/public/api/lead_wa/{{$campaign->id}}/{{$campaign->product_id}}" method="POST" class="d-flex justify-content-center">
        <button id="submit-wa" type="submit" class="btn btn-success d-flex justify-content-center rounded-pill" onclick="{{$campaign->event_wa->event_pixel}}"><i class="lab la-whatsapp pe-2" style="font-size: 24px;"></i>Pemesanan Via Whatsapp</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(function(){
        $('#submit-wa').click(function(){
            $('#submit-wa').attr('class', 'btn btn-success d-flex justify-content-center rounded-pill disabled');
        });
    });
    </script>
</body>
</html>
                                                        </textarea>
                                                    </td>
                                                    <td>
                                                        <textarea type="text" name="wp" id="inputwp" class="form-control" aria-describedby="wpHelpInline" >
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title></title>
</head>
<body>

    <div class="container">
        <form action="https://api.pwkbackoffice.com/public/api/lead/{{$campaign->id}}/{{$campaign->product_id}}" method="POST">
        <div class="mb-3" hidden>
                <label for="exampleInputNama" class="form-label">Campaign Id</label>
            <input type="number" name="campaign_id" value="{{$campaign->id}}" class="form-control" id="exampleInputNama" aria-describedby="namaHelp">
        </div>
        <div class="mb-3">
                <label for="exampleInputNama" class="form-label">Nama Lengkap</label>
            <input type="nama" name="name" class="form-control" id="exampleInputNama" aria-describedby="namaHelp">
        </div>
        <div class="mb-3">
                <label for="exampleInputWhatsapp" class="form-label">No. Whatsapp</label>
                <input type="text" name="whatsapp" class="form-control" id="exampleInputWhatsapp">
        </div>
        <i style="opacity: 50%">Banyumax.id</i>
        <div class="d-flex justify-content-center">
            <button id="submitForm" type="submit" class="btn btn-primary rounded-pill" onclick="{{$campaign->event_pixel->event_pixel}}">Submit</button>
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(function(){
        $('#submitForm').click(function(){
            $('#submitForm').attr('class', 'btn btn-primary rounded-pill disabled');
        });
    });
    </script>
    <script>
        !function (w, d, t) {
            w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
            ttq.load('YOUR PIXEL ID WILL BE LOCATED HERE');
            ttq.page();
        }(window, document, 'ttq');
    </script>
</body>
</html>
                                                        </textarea>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                            <form action="{{ route('campaign.edit',['campaign' => $campaign->id]) }}" method="GET">
                                                                @csrf
                                                                <div class="btn-toolbar justify-content-between " role="toolbar" aria-label="Toolbar with button groups">
                                                                    <div class="btn-group" role="group" aria-label="First group">
                                                                        <button type="submit" title="Click to edit campaign" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <form action="{{ route('addOperator', ['campaign' => $campaign->id]) }}" method="GET">
                                                                @csrf
                                                                <div class="btn-toolbar justify-content-between px-2 " role="toolbar" aria-label="Toolbar with button groups">
                                                                    <div class="btn-group" role="group" aria-label="First group">
                                                                        <button type="submit" title="Click to add operator" class="btn btn-success  btn-icon"><i class="la la-users"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <form action="{{route('campaign.destroy',['campaign' => $campaign->id])}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                                                    <div class="btn-group" role="group" aria-label="First group">
                                                                        <button type="submit" title="Click to delete campaign" class="btn btn-danger btn-icon" onclick="return confirm('Jadi Delete Kah ?')"><i class="la la-trash"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table container-->
								</div>
								<!--begin::Body-->
							</div>
							<!--end::Tables Widget 11-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    @include('layout/_footer')
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
              var postURL = "<?php echo url('addProduct'); ?>";
              var i=1;

              $('#add').click(function(){
                   i++;
                   $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="user_id[]" placeholder="Enter Operator" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
              });

              $(document).on('click', '.btn_remove', function(){
                   var button_id = $(this).attr("id");
                   $('#row'+button_id+'').remove();
              });


              $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


              $('#submit').click(function(){
                   $.ajax({
                        url:postURL,
                        method:"POST",
                        data:$('#operator_name').serialize(),
                        type:'json',
                        success:function(data)
                        {
                            if(data.error){
                                previewMessage(data.error);
                            }else{
                                i=1;
                                $('.dynamic-added').remove();
                                $('#operator_name')[0].reset();
                                $(".print-success-msg").find("ul").html('');
                                $(".print-success-msg").css('display','block');
                                $(".error-message-display").css('display','none');
                                $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                            }
                        }
                   });
              });


              function previewMessage (msg) {
                 $(".error-message-display").find("ul").html('');
                 $(".error-message-display").css('display','block');
                 $(".print-success-msg").css('display','none');
                 $.each( msg, function( key, value ) {
                    $(".error-message-display").find("ul").append('<li>'+value+'</li>');
                 });
              }
            });
        </script>

		{{-- <script type="text/javascript">
			var i = 0;
			$("#dynamic-ar").click(function () {
				++i;
				$("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
					'][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
					);
			});
			$(document).on('click', '.remove-input-field', function () {
				$(this).parents('tr').remove();
			});
		</script> --}}
        <script>
            $(document).ready(function() {
                $('#product_id').on('change', function() {
                    var roleId = $(this).val();
                    if(roleId) {
                        $.ajax({
                            url: '/getRole/'+roleId,
                            type: "GET",
                            data : {"_token":"{{ csrf_token() }}"},
                            dataType: "json",
                            success:function(data)
                        });
                    }
                });
            });
        </script>
	</body>
	<!--end::Body-->
</html>
