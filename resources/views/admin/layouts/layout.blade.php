<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Appointment System</title>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>
    <body>
    <div class="mainWrapper">
        @include('admin.layouts.header.sidenavbar')
        <div class="displaySection">
            @include('admin.layouts.header.nav')
            @yield('content')
        </div>
    </div>
        @include('admin.layouts.footer.footer')
    @include('admin.layouts.scripts.footerScript')
    </body>
</html>
