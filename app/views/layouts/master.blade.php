<!doctype html>
<html class="y">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
    <meta name="author" content="{{ Config::get('website.author') }}">
    <meta name="keywords" content="{{ Config::get('website.keywords') }}">
    <meta name="description" content="{{ Config::get('website.description') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $title or 'Hello, Laravel.' }}</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    {{ HTML::style('assets/application.css') }}
    <link rel="stylesheet" type="text/css" href="http://ricostacruz.com/nprogress/nprogress.css">
    <script src="http://remote.qiniudn.com/jquery.js"></script>
    <script src="http://ricostacruz.com/nprogress/nprogress.js"></script>
    <script src="http://remote.qiniudn.com/turbolinks.js"></script>
    {{ HTML::script('assets/application.js') }}
</head>
<body>
<div class="navbar">
    <div class="inner">
<!--         <div id="logo">
            <a href="{{ url('/') }}">{{ Config::get('website.logo') }}<sup>{{ Config::get('website.version') }}</sup></a>
        </div> -->
        <div class="opts pull_right">
        @include('partials.user.options')
        </div>
    </div>
</div>
<div class="master">
    <div class="grid">
        <div class="unit fat">
            @yield('main')
        </div>
        <div class="unit slim">
            @yield('sidebar')
        </div>
    </div>
</div>
<div class="footer">
    <p>{{ Config::get('website.copyright') }}</p>
</div>
<script>
    $(document).on('page:fetch',   function() { NProgress.start(); });
    $(document).on('page:change',  function() { NProgress.done(); });
    $(document).on('page:restore', function() { NProgress.remove(); });
</script>
</body>
</html>
