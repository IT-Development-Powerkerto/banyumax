<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    Klik tombol dibawah untuk reset password
    <a href="{{ route('sendResetPassword', $details['token']) }}">Reset Password</a>
</body>
</html>