<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>КИП ЛАЙН ТРЕЙД</title>
    <link rel="stylesheet" href="{{asset('external/custom/client/app.css')}}">
    <link rel="stylesheet" href="{{asset('external/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('external/mdbootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('external/mdbootstrap/css/mdb.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="{{asset('external/hamburger/hamburger.css')}}">
    <link rel="icon" href="{{asset('favicon.ico')}}">
</head>
<body class="homepage-v1 hidden-sn animated">
@include('page-parts.header')
@yield('content')
@include('page-parts.footer')
@include('page-parts.scripts')
@yield('scripts')
<script src="{{asset('external/toastr/toastr.min.js')}}"></script>
<script>
    $('.hamburger').on('click', function () {
        $(this).toggleClass('is-active');
    });
</script>
</body>
</html>