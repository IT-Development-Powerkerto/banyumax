<!--begin::Page title-->
<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
	data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
	class="page-title d-flex align-items-center flex-wrap me-3 mx-3  mb-5 mb-lg-0">
	<!--begin::Title-->
	<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Dashboard
		<!--begin::Separator-->
		<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
		<!--end::Separator-->
		<!--begin::Description-->
		<small class="text-muted fs-7 fw-bold my-1 ms-1">{{Auth()->user()->role->name}}</small>
		<div class="d-flex align-items-center flex-wrap">
			<div class="menu-content px-5">
				<label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success">
					<input type="checkbox" data-id="{{ Auth()->user()->id }}" name="status" class="form-check-input w-30px h-20px toggle-class js-switch" {{ Auth()->user()->status == 1 ? 'checked' : '' }}>
					<span class="pulse-ring ms-n1"></span>
				</label>
                {{-- <input type="checkbox" data-id="{{ Auth()->user()->id }}" name="status" class="js-switch" {{ Auth()->user()->status == 1 ? 'checked' : '' }}> --}}
			</div>
		</div>
		<!--end::Description-->
	</h1>
	<!--end::Title-->
</div>

<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });
</script>
<!--end::Page title-->
