<!DOCTYPE html>
<html lang="pt-br" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{Config::get('info.site_name')}}</title>
    <link href="{{asset('/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset(Config::get('info.favicon'))}}" rel="icon" type="image/x-icon"  >
</head>

<body>
<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
@include('layouts.admin.header')
<!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
@include('layouts.admin.sidebar')
<!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT START
    *********************************************************************************************************************************************************** -->
    <section id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </section>

    <!-- END CONTENT -->

</section>
<script src="{{asset('assets/js/angular.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

</body>
</html>
