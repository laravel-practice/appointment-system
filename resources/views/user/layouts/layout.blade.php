<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Appointment System</title>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}"/>
    </head>
    <body>
        @include('user.layouts.header.nav')
        @yield('content')
        @include('user.layouts.footer.footer')
        @include('user.layouts.scripts.footerScript')
    </body>
</html>
