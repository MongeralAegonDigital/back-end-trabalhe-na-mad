<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{Config::get('info.site_name')}}</title>
    <link href="{{asset('/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset(Config::get('info.favicon'))}}" rel="icon" type="image/x-icon"  >
</head>
<body>
<section id="container" >
    @yield('content')
<!-- END CONTENT -->
</section>
<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>
