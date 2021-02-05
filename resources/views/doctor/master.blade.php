<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('title')

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link href="{{ asset('css/the-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/filepond.css') }}" rel="stylesheet">
    <!-- Style Sheet -->
    <link href="{{ asset('css/style.css') }}"  rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="gray">
    @yield('content')

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    {{-- <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> --}}
    <script src="{{ asset('js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/the-datepicker.js') }}"></script>
    <script src="{{ asset('js/filepond.js') }}" ></script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
