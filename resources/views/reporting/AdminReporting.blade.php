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
	<link href="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Page Vendor Stylesheets-->

	<!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
	<!--end::Global Stylesheets Bundle-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
	class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed">

	@include('reporting/layout/master')

	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="../assets/plugins/global/plugins.bundle.js"></script>
    <script src="../assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="../assets/js/custom/apps/customers/list/export.js"></script>
    <script src="../assets/js/custom/apps/customers/list/list.js"></script>
    <script src="../assets/js/custom/apps/customers/add.js"></script>
    <script src="../assets/js/custom/daily-widgets.js"></script>
    <script src="../assets/js/custom/apps/chat/chat.js"></script>
    <script src="../assets/js/custom/modals/create-app.js"></script>
    <script src="../assets/js/custom/modals/upgrade-plan.js"></script>
    <script>
        $(function(){

            $("#omsetCB").change(function() {
                if(this.checked) {
                    $('#totalOmset').removeAttr('hidden', false);
                }else{
                    $('#totalOmset').attr('hidden', true);
                }
            });
            $("#bottleCB").change(function() {
                if(this.checked) {
                    $('#totalBottle').removeAttr('hidden', false);
                }else{
                    $('#totalBottle').attr('hidden', true);
                }
            });
            $("#leadCB").change(function() {
                if(this.checked) {
                    $('#totalLead').removeAttr('hidden', false);
                }else{
                    $('#totalLead').attr('hidden', true);
                }
            });
            $("#closingCB").change(function() {
                if(this.checked) {
                    $('#totalClosing').removeAttr('hidden', false);
                }else{
                    $('#totalClosing').attr('hidden', true);
                }
            });
            $("#CRCB").change(function() {
                if(this.checked) {
                    $('#CR').removeAttr('hidden', false);
                }else{
                    $('#CR').attr('hidden', true);
                }
            });
            $("#ADVCB").change(function() {
                if(this.checked) {
                    $('#ADVRank').removeAttr('hidden', false);
                }else{
                    $('#ADVRank').attr('hidden', true);
                }
            });
            $("#CSCB").change(function() {
                if(this.checked) {
                    $('#CSRank').removeAttr('hidden', false);
                }else{
                    $('#CSRank').attr('hidden', true);
                }
            });
            $("#productCB").change(function() {
                if(this.checked) {
                    $('#productRank').removeAttr('hidden', false);
                }else{
                    $('#productRank').attr('hidden', true);
                }
            });
        });
    </script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
