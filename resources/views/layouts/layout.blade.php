<!DOCTYPE html>
<html lang="pt" itemscope itemtype="https://schema.org/Article">
<head>
    <meta charset="utf-8">
    <title>{{ Config::get('info.site_title') }} | </title>
    <meta name="description" content="{{ Config::get('info.site_desc') }}"/>
    <meta name="robots" content="index, follow"/>
    <meta itemprop="name" content="{{ Config::get('info.site_name') }}"/>
    <meta itemprop="description" content="{{ Config::get('info.site_desc') }}"/>
    <meta itemprop="image" content="{{Config::get('info.site_image')}}"/>
    <meta itemprop="url" content="{{Config::get('info.site_link')}}"/>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ Config::get('info.site_name') }}"/>
    <meta property="og:site_name" content="{{ Config::get('info.site_name') }}"/>
    <meta property="og:url" content="{{Config::get('info.site_link')}}"/>
    <meta property="og:description" content="{{ Config::get('info.site_desc') }}"/>
    <meta property="og:image" content="{{Config::get('info.site_image')}}"/>
    <meta property="og:locale" content="pt_BR" />

    <meta property="fb:app_id" content="{{Config::get('info.app_id')}}"/>
    <meta property="article:author" content="{{Config::get('info.author')}}"/>
    <meta property="article:publisher" content="{{Config::get('info.publisher')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset(Config::get('info.favicon'))}}" rel="icon" type="image/x-icon"  >
    <!--======================== CSS ALL ========================-->
    <link rel="alternate" hreflang="pt-BR" href="" title="">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto+Slab|Chewy" rel="stylesheet">
    <link href="{{url('assets/css/portal.css')}}" rel="stylesheet" type="text/css">
    <![endif]-->
</head>
<body>
<main>
    @include('layouts.portal.header')
    @include('layouts.portal.nav')
    @yield('content')
    @include('layouts.portal.footer')
</main>
<script src="{{url('assets/js/portal.js')}}"></script>
<script>
    $(document).ready(function () {
        var wow = new WOW;
        wow.init()
    })
</script>
</body>
</html>







