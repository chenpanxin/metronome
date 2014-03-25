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
            <a href=""><span class="icon-login"></span></a>
            <a href=""><span class="icon-signup"></span></a>
            <a href=""><span class="icon-logout"></span></a>
            <a href=""><span class="icon-user"></span></a>
            <a href=""><span class="icon-users"></span></a>
            <a href=""><span class="icon-logout"></span></a>
            <a href=""><span class="icon-home"></span></a>
        </div>
    </div>
</div>
<div class="master">
    <div class="grid">
        <div class="unit fat">
            <div class="boxify">
                <ul class="list topic">
                    <li></li>
                    <li></li>
                    <li></li>
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
