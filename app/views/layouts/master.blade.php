<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title or 'Hello, Laravel.' }}</title>
    {{ HTML::style('assets/application.css') }}
    {{ HTML::script('http://remote.qiniudn.com/jquery.js') }}
    {{ HTML::script('assets/application.js') }}
</head>
<body>
<div class="navbar">
    <div class="inner">
        <div id="logo">
            <a href="{{ url('/') }}">{{ studly_case('ruby') }}<sup>{{ studly_case('beta') }}</sup></a>
        </div>
        <div class="options pull_right">
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
<div class="footer"></div>
</body>
</html>
