
									<!--begin::Statistics Widget 5-->
									<label class="card card-xl-stretch mb-5 mb-xl-8 bg-white">
										<!--begin::Body-->
										<div class="card-body rounded shadow-sm" style="color:#1961A6; border:1px solid #1961A6">
											<div class="fw-bold fs-3 mb-2 mt-5">Total Leads</div>
											<div class="fw-bolder fs-3hx mt-n2">
                                                <script>
                                                    var bilangan = {{$lead_day_count}};

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
										<!--end::Body-->
									</label>
									<!--end::Statistics Widget 5-->
