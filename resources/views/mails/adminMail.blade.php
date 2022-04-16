<!DOCTYPE html>
<html>
<head>
    <title>New Order</title>
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

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: white;
        }
        .mail {
            border-radius: 20px;
            background-color: rgb(38,93,112, 0.7);
            padding: 30px;
        }

        .button{
            padding: 20px;
            background-color: #177B4C;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            border-radius: 20px;
        }
        a{ 
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
        }

        p{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>Congratulations, you have registered at Banyumax.id</p>
    {{--  <div class="mail">
        Detail pesan
    </div>  --}}
    {{--  <div class="button">
        <a href="https://api.whatsapp.com/send/?phone={{$details['client_number']}}&text={{ str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($details['client'], $details['client_number'], $details['operator'], $details['product']), $details['FU_text']) }}" class="btn">Follow up via Whatsapp</a>
    </div>  --}}
</body>
</html>