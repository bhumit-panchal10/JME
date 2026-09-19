<head>
    @yield('opTag')
    <!-- =========================
         BASIC META
    ========================== -->

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- <meta name="description" content="Jay Mahakal Enterprise Group - Engineering, Procurement and Construction Solutions">

    <meta name="keywords"
        content="JME Group, Jay Mahakal Enterprise Group, Engineering, EPC, Piping, Electrical, Fire Protection, Passive Network"> --}}

    <meta name="author" content="Jay Mahakal Enterprise Group">

    <!-- =========================
         TITLE
    ========================== -->

    <title>
        @yield('title')
    </title>


    <!-- =========================
         FAVICON
    ========================== -->

    <link rel="icon" type="image/png" href="{{ asset('front/images/favicon.png') }}">


    <!-- =========================
         EXTERNAL CSS
    ========================== -->

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    @yield('head')
</head>
