
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label fw-bolder fs-3 mb-1">Request Budgeting ADV</span>
											</h3>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body shadow-sm py-3" data-wheel-propagation="true">
											<form action="{{route('budgeting.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row g-xl-12 my-1 d-flex align-items-center justify-content-center">
                                                    <div class="col-1">
                                                        <h1 class="fw-bolder ms-5">Rp</h1>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="text" class="form-control" name="requirement" placeholder="Request" aria-label="Budget Submission">
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="text" class="form-control" name="target" placeholder="Target" aria-label="Target">
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="submit" class="btn btn-primary" value="Apply">
                                                    </div>
                                                </div>
                                            </form>
										</div>
										<!--begin::Body-->
									</div>
									<!--end::Tables Widget 9-->
