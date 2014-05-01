@if (Auth::check())
    <a href="{{ URL::to('user/'.Auth::user()->username) }}"><span class="icon-user"></span></a>
    <a href="{{ URL::to('settings') }}"><span class="icon-setting"></span></a>
    {{ HTML::deleteTag('<span class="icon-logout"></span>', URL::to('logout')) }}
@else
    <a href="{{ URL::to('login') }}">{{ Lang::get('locale.login') }}</a>
    <a href="{{ URL::to('signup') }}">{{ Lang::get('locale.signup') }}</a>
@endif
