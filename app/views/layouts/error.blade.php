<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="{{ Config::get('website.keywords') }}">
    <meta name="description" content="{{ Config::get('website.description') }}">
    <title>{{ $title or 'Hello, Laravel.' }}</title>
    {{ HTML::style('assets/application.css') }}
    {{ HTML::script('http://remote.qiniudn.com/jquery.js') }}
    {{ HTML::script('assets/application.js') }}
</head>
<body>
<div class="navbar">
    <div class="inner">
        <div id="logo">
            <a href="{{ url('/') }}">{{ Config::get('website.logo') }}<sup>{{ Config::get('website.version') }}</sup></a>
        </div>
        <div class="options pull_right">
        @include('partials.user.options')
        </div>
    </div>
</div>
<div class="master">
    <div class="grid">
        <div class="unit full">
            @yield('main')
        </div>
    </div>
</div>
<div class="footer"></div>
</body>
</html>
