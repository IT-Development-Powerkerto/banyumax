
									<!--begin::Tables Widget 9-->
									<div class="card card-l-stretch mb-5 mb-xl-8 pb-4" style="height: 500px">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column mt-n3">
												<span class="card-label text-white fw-bolder fs-3 mb-1">Product</span>
												<span class="text-white mt-1 fw-bold fs-7">
                                                    <script>
                                                        var bilangan = {{$products->count()}};

                                                        var	number_string = bilangan.toString(),
                                                            sisa 	= number_string.length % 3,
                                                            rupiah 	= number_string.substr(0, sisa),
                                                            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

                                                        if (ribuan) {
                                                            separator = sisa ? '.' : '';
                                                            rupiah += separator + ribuan.join('.');
                                                        }

                                                        document.write(rupiah);
                                                    </script> Product
                                                </span>
											</h3>
											<div class="card-toolbar mt-n3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a product">
												<a href="#" data-bs-toggle="modal" data-bs-target="#add-product" class="btn btn-sm btn-light btn-active-primary text-hover-white" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends" style="color: #00509d;">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-3" >
													<i class="las la-plus" style="color: #00509d;"></i>
												</span>
												<!--end::Svg Icon-->Add Product</a>
											</div>
											<div class="modal fade" tabindex="-1" id="add-product">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" >Add Product</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
																@csrf
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputFullname" class="col-form-label">Name</label>
																	</div>
																	<div class="col-10">
																		<input type="text" name="name" id="inputFullname" class="form-control @error('name') is-invalid @enderror" aria-describedby="fullnameHelpInline" required>
                                                                        @error('name')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputprice" class="col-form-label">Price</label>
																	</div>
																	<div class="col-10">
																		<input type="price" name="price" id="inputprice" class="form-control @error('price') is-invalid @enderror" aria-describedby="priceHelpInline" required>
                                                                        @error('price')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="sku" class="col-form-label">SKU</label>
																	</div>
																	<div class="col-10">
																		<input type="text" name="sku" id="sku" class="form-control" aria-describedby="discountHelpInline">
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputimage" class="col-form-label">Image</label>
																	</div>
																	<div class="dropdown col-10">
																		<div class="mb-3">
																			<input class="form-control" type="file" id="inputimage" name="image" id="formFileMultiple" multiple id>
																		</div>
																	</div>
																</div>
																<div class="row align-items-center col-12 pb-5">
																	<div class="col-2">
																		<label for="inputproduct_link6" class="col-form-label">Product Link</label>
																	</div>
																	<div class="col-10">
																		<input type="product_link" name="product_link" id="inputproduct_link6" class="form-control" aria-describedby="passwordHelpInline">
																	</div>
																</div>
																{{ csrf_field() }}
																<input type="submit" class="btn btn-primary mt-5 float-end me-6" value="Add Product">
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body--><div class="card-body py-3 scroll scroll-pull" data-scroll="true" data-wheel-propagation="true" style="height: 500px">
											<!--begin::Table container-->
											<div class="table-responsive">
												<!--begin::Table-->
												<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
													<!--begin::Table head-->
													<thead>
														<tr class=" text-muted">
															<th class="min-w-100px">Name</th>
															<th class="min-w-90px">Price</th>
															<th class="min-w-50px text-end">Action</th>
														</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
                                                        <?php $n=0; ?>
                                                        @foreach ($products as $product)
														<tr>
															<td>
																<div class="d-flex align-items-center">
																	<div class="symbol symbol-45px me-5">
																		<img src="{{ $product->image }}" alt="" />
																	</div>
																	<div class="d-flex justify-content-start flex-column">
																		<span class="text-dark text-hover-primary fs-6">{{ $product->name }}</span>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="d-flex justify-content-start flex-column">
																		<span class="text-dark text-hover-primary fs-6">Rp.
                                                                            <script>
                                                                                var bilangan = {{ $product->price }};

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
                                                                        </span>
																	</div>
																</div>
															</td>
															<td>
																<div class="d-flex justify-content-end flex-shrink-0" aria-label="Basic outlined example">
                                                                    <form action="{{ route('product.edit',['product' => $product->id]) }}" method="GET">
                                                                        @csrf
																		<div class="btn-toolbar justify-content-between px-2" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" data-bs-toggle="modal" data-bs-target="#edit-user" class="btn btn-icon" style="background-color: #1696e0;"><i class="las la-plus-circle text-white"></i></i></button>
																			</div>
																		</div>
                                                                    </form>
                                                                    <form action="{{ route('product.destroy', ['product'=>$product->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
																		<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
																			<div class="btn-group" role="group" aria-label="First group">
																				<button type="submit" class="btn btn-icon" onclick="return confirm('Jadi Delete Kah ?')" style="background-color: #e0252c;"><i class="la la-trash text-white"></i></button>
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
