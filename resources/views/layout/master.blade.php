<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('asset/icon/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    {{-- <div class="container">
        @include('layout.header')
    </div> --}}

    <div>
        @yield('content')
    </div>

    {{-- @include('layout.footer') --}}

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
