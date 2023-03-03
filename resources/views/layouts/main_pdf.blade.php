<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/qrcode.css') }}" rel="stylesheet">
</head>
<body>
    <style type="text/css" media="print">
    body{
        page-break-before: void;
        width: 100%;
        height: 100%;
        justify-content: center;
    align-items: center;
        -webkit-transform: rotate(-90deg) scale(.68,.68);
        -moz-transform: rotate(-90deg) scale(.68,.68);
        zoom:200%;
    }
    </style>
    <div>

        {{-- <main class="py-4"> --}}
            @yield('content')
        {{-- </main> --}}
    </div>
</body>
</html>
