<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="">
	<title>{{Auth()->user()->role->name}}</title>

	<link rel="icon" href="img/favicon.png">

	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->

	<!--begin::Page Vendor Stylesheets(used by this page)-->
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->

	<!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
	<!--end::Global Stylesheets Bundle-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
	class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed">

	@include('manager/layout/masterWeekly')

	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="assets/js/custom/apps/customers/list/export.js"></script>
    <script src="assets/js/custom/apps/customers/list/list.js"></script>
    <script src="assets/js/custom/apps/customers/add.js"></script>
    <script src="assets/js/custom/weekly-widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/modals/create-app.js"></script>
    <script src="assets/js/custom/modals/upgrade-plan.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script>
        function lead_day(){
            document.getElementById("lead_count").innerHTML = "{{ $lead_day->count() }}";
            document.getElementById("product_count").innerHTML = "{{ $lead_day->where('product_id', $products->implode('id'))->count() }}";
        }
        function lead_week(){
            document.getElementById("lead_count").innerHTML = "{{ $lead_week->count() }}";
            document.getElementById("product_count").innerHTML = "{{ $lead_week->where('product_id', $products->implode('id'))->count() }}";
        }
        function lead_month(){
            document.getElementById("lead_count").innerHTML = "{{ $lead_month->count() }}";
            document.getElementById("product_count").innerHTML = "{{ $lead_month->where('product_id', $products->implode('id'))->count() }}";
        }
        function lead_all(){
            document.getElementById("lead_count").innerHTML = "{{ $lead_all->count() }}";
            document.getElementById("product_count").innerHTML = "{{ $lead_all->where('product_id', $products->implode('id'))->count() }}";
            //alert("{{ $lead_all->where('product_id', $products->implode('id'))->count() }}");
        }
    </script>
    <script>
        function omset_day(){
            document.getElementById("omset").innerHTML = "Rp. {{ $omset_day }}";
            {{--  document.getElementById("product_count").innerHTML = "{{ $lead_day->where('product_id', $product->id)->count() }}";  --}}
        }
        function omset_week(){
            document.getElementById("omset").innerHTML = "Rp. {{ $omset_week }}";
            {{--  document.getElementById("product_count").innerHTML = "{{ $lead_week->where('product_id', $product->id)->count() }}";  --}}
        }
        function omset_month(){
            document.getElementById("omset").innerHTML = "Rp. {{ $omset_month }}";
            {{--  document.getElementById("product_count").innerHTML = "{{ $lead_month->where('product_id', $product->id)->count() }}";  --}}
        }
        function omset_all(){
            document.getElementById("omset").innerHTML = "Rp. {{ $omset_all->sum('total_price') }}";
            {{--  document.getElementById("product_count").innerHTML = "{{ $lead_all->where('product_id', $product->id)->count() }}";  --}}
            {{--  alert("{{ $lead_all->where('product_id', $product->id)->count() }}");  --}}
        }
    </script>
    <script>
        function budgeting_day(){
            document.getElementById("budgeting").innerHTML = "Rp. {{ $budgeting_day }}";
            {{--  document.getElementById("product_count").innerHTML = "{{ $lead_day->where('product_id', $product->id)->count() }}";  --}}
        }
        function budgeting_week(){
            document.getElementById("budgeting").innerHTML = "Rp. {{ $budgeting_week }}";
            {{--  document.getElementById("product_count").innerHTML = "{{ $lead_week->where('product_id', $product->id)->count() }}";  --}}
        }
        function budgeting_month(){
            document.getElementById("budgeting").innerHTML = "Rp. {{ $budgeting_month }}";
            {{--  document.getElementById("product_count").innerHTML = "{{ $lead_month->where('product_id', $product->id)->count() }}";  --}}
        }
        function budgeting_all(){
            document.getElementById("budgeting").innerHTML = "Rp. {{ $budgeting_all->sum('requirement') }}";
            {{--  document.getElementById("product_count").innerHTML = "{{ $lead_all->where('product_id', $product->id)->count() }}";  --}}
            {{--  alert("{{ $lead_all->where('product_id', $product->id)->count() }}");  --}}
        }
    </script>
    <script>
        // Class definition

        var KTBootstrapDatepicker = function () {

        var arrows;
        if (KTUtil.isRTL()) {
        arrows = {
        leftArrow: '<i class="la la-angle-right"></i>',
        rightArrow: '<i class="la la-angle-left"></i>'
        }
        } else {
        arrows = {
        leftArrow: '<i class="la la-angle-left"></i>',
        rightArrow: '<i class="la la-angle-right"></i>'
        }
        }

        // Private functions
        var demos = function () {
        // minimum setup
        $('#kt_datepicker_1').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
        });

        // minimum setup for modal demo
        $('#kt_datepicker_1_modal').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
        });

        // input group layout
        $('#kt_datepicker_2').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
        });

        // input group layout for modal demo
        $('#kt_datepicker_2_modal').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
        });

        // enable clear button
        $('#kt_datepicker_3, #kt_datepicker_3_validate').datepicker({
        rtl: KTUtil.isRTL(),
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        templates: arrows
        });

        // enable clear button for modal demo
        $('#kt_datepicker_3_modal').datepicker({
        rtl: KTUtil.isRTL(),
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        templates: arrows
        });

        // orientation
        $('#kt_datepicker_4_1').datepicker({
        rtl: KTUtil.isRTL(),
        orientation: "top left",
        todayHighlight: true,
        templates: arrows
        });

        $('#kt_datepicker_4_2').datepicker({
        rtl: KTUtil.isRTL(),
        orientation: "top right",
        todayHighlight: true,
        templates: arrows
        });

        $('#kt_datepicker_4_3').datepicker({
        rtl: KTUtil.isRTL(),
        orientation: "bottom left",
        todayHighlight: true,
        templates: arrows
        });

        $('#kt_datepicker_4_4').datepicker({
        rtl: KTUtil.isRTL(),
        orientation: "bottom right",
        todayHighlight: true,
        templates: arrows
        });

        // range picker
        $('#kt_datepicker_5').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        templates: arrows
        });

        // inline picker
        $('#kt_datepicker_6').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        templates: arrows
        });
        }

        return {
        // public functions
        init: function() {
        demos();
        }
        };
        }();

        jQuery(document).ready(function() {
        KTBootstrapDatepicker.init();
        });
    </script>
</body>
<!--end::Body-->

</html>
