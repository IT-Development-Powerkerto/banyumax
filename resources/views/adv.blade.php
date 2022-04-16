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
	class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed"  style="background-color: #e2e2e2;">

	@include('layout/masterADV')

	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="assets/js/custom/apps/customers/list/export.js"></script>
    <script src="assets/js/custom/apps/customers/list/leads.js"></script>
    <script src="assets/js/custom/apps/customers/add.js"></script>
	<script src="assets/js/custom/daily-widgets.js"></script>
	<script src="assets/js/custom/apps/chat/chat.js"></script>
	<script src="assets/js/custom/modals/create-app.js"></script>
	<script src="assets/js/custom/modals/upgrade-plan.js"></script>
	<script src="assets/js/custom/intro.js"></script>
    <script>
        $(document).ready(function() {
            $('#role_id').on('change', function() {
                var roleId = $(this).val();
                if(roleId) {
                    $.ajax({
                        url: '/getRole/'+roleId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data);
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#icon_id').on('change', function() {
                var roleId = $(this).val();
                if(roleId) {
                    $.ajax({
                        url: '/getRole/'+roleId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data);
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.js-switch').change(function () {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('users.update.status') }}',
                    data: {'status': status, 'user_id': userId},
                    success: function (data) {
                        console.log(data.message);
                    }
                });
            });
        });
    </script>
	<!--end::Page Custom Javascript-->
    {{-- Countdown --}}
    <script>
        function CountDownTimer(duration, display) {
            let timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                let codeDisplay = '<h1 class="text-dark fw-normal fs-6 badge badge-light-success">' +
                                    minutes + ":" + seconds +
                                  '</h1>';


                display.innerHTML = codeDisplay;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }
    </script>
    <script>
        function CountUpTimer(duration, display) {
            let timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                let codeDisplay = '<h1 class="text-dark fw-normal fs-6 badge badge-light-danger">' +
                                    minutes + ":" + seconds +
                                  '</h1>';


                display.innerHTML = codeDisplay;

                // display.textContent = minutes + ":" + seconds;

                if (++timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }
    </script>
    <script>
        function StopTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                let codeDisplay = '<h1 class="text-dark fw-normal fs-6 badge badge-light-primary">' +
                                    minutes + ":" + seconds + '</h1>';


                display.innerHTML = codeDisplay;

                if (timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }
    </script>
    <script src="/js/app.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
        var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
        cluster: '{{env("PUSHER_APP_CLUSTER")}}',
        encrypted: true
        });

        var channel = pusher.subscribe('message-channel');
        channel.bind('App\\Events\\MessageCreated', function(data) {
            window.location = window.location.href;
        });
    </script>
	<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
