<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title or 'Hello, Laravel.' }}</title>
    {{ HTML::style('assets/application.css') }}
</head>
<body>
<div class="navbar">
    <div class="inner">
        <div id="logo"></div>
        <div class="options pull_right">
            @if (Auth::check())
                <a href=""><span class="icon-user"></span></a>
            @else
                <a href="{{ URL::to('login') }}">{{ Lang::get('locale.login') }}</a>
                <a href="{{ URL::to('signup') }}">{{ Lang::get('locale.signup') }}</a>
            @endif
        </div>
    </div>
</div>
<div class="master">
    <div class="grid">
        <div class="unit fat">
            <div class="boxify">
                <ul class="list topic">
                    <li>
                        <a class="title" href="">Ampou</a>
                        <span class="avatar"><img src="http://composer.qiniudn.com/me.jpg"></span>
                        <p></p>
                    </li>
                </ul>
                <div class="pagination"></div>
            </div>
        </div>
        <div class="unit slim">
            <div class="boxify"></div>
            <div class="boxify"></div>
        </div>
    </div>
    @yield('main')
    <div class="sidebar"></div>
</div>
<div class="footer"></div>
</body>
</html>
