
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-l-8 pb-4">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder fs-3 mb-1">Campaign {{$campaign->title}}</span>
												<span class="text-muted mt-1 fw-bold fs-7">
                                                    <script>
                                                        var bilangan = {{$lead->where('campaign_id', $campaign->id)->count()}};

                                                        var	number_string = bilangan.toString(),
                                                            sisa 	= number_string.length % 3,
                                                            rupiah 	= number_string.substr(0, sisa),
                                                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                        if (ribuan) {
                                                            separator = sisa ? '.' : '';
                                                            rupiah += separator + ribuan.join('.');
                                                        }

                                                        document.write(rupiah);
                                                    </script> Leads
                                                </span>
											</h3>
                                            <form action="/ld" method="GET" class="d-flex">
                                                <div class="me-2 d-flex flex-row">
                                                    <input class="form-control mt-0 form-control-solid" name="date_filter"  id="date_filter" type="date" style="height: 33px;" onchange="submit()">
                                                </div>
                                            </form>
											{{-- <div class="me-2">
                                                <input class="form-control mt-0" name="search" id="searchlead" type="date" placeholder="Search" aria-label="Search" style="height: 33px;">
                                            </div> --}}
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
														<tr class="fw text-muted">
                                                            <th class="min-w-50px text-center">Order ID</th>
															<th class="text-center">Customer Nama</th>
															<th class="text-center">Whatsapp Customer</th>
															<th class="text-center">Costumer Service</th>
															<th class="text-center">Response Time</th>
                                                            <th class="text-center">Actions</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        @foreach ($lead->where('campaign_id', $campaign->id) as $key =>$lead)
                                                            <tr>
                                                                <td class="text-end">
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-normal fs-6">Ord-{{$lead->id}}</h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-normal fs-6">
                                                                            {{$lead->client_name}}
                                                                        </h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{--<label class="text-dark fw-normal d-block fs-6">{{$lead->client->whatsapp}}</label>--}}
                                                                    {{--  <a href="https://api.whatsapp.com/send/?phone={{ $lead->client->whatsapp }}&text={{ $lead->campaign->cs_to_customer }}">{{ $lead->client->whatsapp }}</a>  --}}
                                                                    <a class="text-primary fw-normal fs-6 text-hover-primary" href="https://api.whatsapp.com/send/?phone={{$lead->client_whatsapp}}&text=Kode Order: ord-{{$lead->id}}%0A{{ rawurlencode(str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($lead->client_name, $lead->client_whatsapp, $lead->operator->name ?? '', $lead->product->name), $lead->campaign->cs_to_customer)) }}">{{$lead->client_whatsapp}}</a>
                                                                </td>
                                                                <td class="">
                                                                    <div class="d-flex align-items-center">
                                                                        <h1 class="text-dark fw-normal fs-6">{{$lead->operator->name ?? ''}}</h1>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-end clock{{ $lead->id }}">
																		<script>
                                                                            window.addEventListener('load', function() {
                                                                                var createdDate = new Date('{{$lead->created_at}}');
                                                                                var updatedDate = new Date('{{$lead->updated_at}}');
                                                                                var nowDate = new Date();
                                                                                if('{{$lead->status_id == 3}}'){
                                                                                    var futureDate = new Date(createdDate.getTime() + 0);
                                                                                    var dif = (nowDate.getTime() - futureDate.getTime()) / 1000;
                                                                                    var Seconds_Between_Dates = Math.abs(Math.round(dif));
                                                                                    var fiveMinutes{{ $lead->id}} = Seconds_Between_Dates;
                                                                                    display = document.querySelector('.clock{{ $lead->id }}');
                                                                                    CountUpTimer(fiveMinutes{{$lead->id}}, display);
                                                                                } else {
                                                                                    var dif = (createdDate.getTime() - updatedDate.getTime()) / 1000;
                                                                                    var Seconds_Between_Dates = Math.abs(Math.round(dif));
                                                                                    var fiveMinutes{{ $lead->id}} = Seconds_Between_Dates;
                                                                                    display = document.querySelector('.clock{{ $lead->id }}');
                                                                                    StopTimer(fiveMinutes{{$lead->id}}, display);
                                                                                }
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                        <form action="{{ route('lead.edit',['lead' => $lead->id]) }}" method="GET">
                                                                            @csrf
                                                                            <div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
                                                                                <div class="btn-group" role="group" aria-label="First group">
                                                                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-primary  btn-icon"><i class="la la-user-edit"></i></button>
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
									<!--end::Tables Widget 9-->
