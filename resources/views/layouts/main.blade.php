<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
        <title>Audit HCM</title>
        <!-- base:css -->
        <link rel="stylesheet" href="{{ asset('vendor/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/base/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    </head>

    <body>
        @include('partials.header')
        @yield('content')

        @include('partials.footer')
        <script src="{{ asset('vendor/base/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <script src="{{ asset('vendor/justgage/raphael-2.1.4.min.js') }}"></script>
        <script src="{{ asset('vendor/justgage/justgage.js') }}"></script>
        <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

        @yield('script')
    </body>
</html>
