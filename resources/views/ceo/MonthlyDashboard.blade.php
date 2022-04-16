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

	@include('ceo/layout/masterMonthly')

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
	<!--end::Page Vendors Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="assets/js/custom/monthly-widgets.js"></script>
	<script src="assets/js/custom/apps/chat/chat.js"></script>
	<script src="assets/js/custom/modals/create-app.js"></script>
	<script src="assets/js/custom/modals/upgrade-plan.js"></script>
	<script src="assets/js/custom/intro.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
        function CountUpTimer(duration, display) {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
                // hours = parseInt((timer / 3600) % 24, 10);
                // minutes = parseInt((timer / 60) % 60, 10);
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                let codeDisplay = '<h1 class="text-dark fw-normal fs-6 badge badge-light-danger">' +
                                    minutes + ":" + seconds +
                                    '</h1>';
                display.innerHTML = codeDisplay;
                //display.textContent = minutes + ":" + seconds;

                if (++timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }
        function StopTimer(duration, display) {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
                // hours = parseInt((timer / 3600) % 24, 10);
                // minutes = parseInt((timer / 60) % 60, 10);
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                let codeDisplay = '<h1 class="text-dark fw-normal fs-6 badge badge-light-success">' +
                                    minutes + ":" + seconds +
                                    '</h1>';
                display.innerHTML = codeDisplay;

                if (timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }
    </script>
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script>
    $(function() {
        $('#add-user').modal('show');
    });
    </script>
    @endif

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

    <script>
        $(document).ready(function(){
            $('#searchstaff').keyup(function(){
                search_table($(this).val());
            });
            function search_table(value){
                $('#staff tr').each(function(){
                    var found = 'false';
                    $(this).each(function(){
                            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                            {
                                found = 'true';
                            }
                    });
                    if(found == 'true')
                    {
                            $(this).show();
                    }
                    else
                    {
                            $(this).hide();
                    }
                });
            }
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#searchlead').keyup(function(){
                search_table($(this).val());
            });
            function search_table(value){
                $('#leads tr').each(function(){
                    var found = 'false';
                    $(this).each(function(){
                            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                            {
                                found = 'true';
                            }
                    });
                    if(found == 'true')
                    {
                            $(this).show();
                    }
                    else
                    {
                            $(this).hide();
                    }
                });
            }
        });
    </script>
    {{-- <script>
            function autoRefresh()
            {
                window.location = window.location.href;
            }
            setInterval('autoRefresh()', 5000).fadeOut('fast').fadeIn('fast');
    </script> --}}

    {{-- <script>
        var auto_refresh = setInterval(
        function()
        {
            $('#myDIV').fadeOut('fast').load('window.location.href').fadeIn("fast");
        }, 5000);
    </script> --}}
	<!--end::Javascript-->
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
</body>
<!--end::Body-->

</html>
