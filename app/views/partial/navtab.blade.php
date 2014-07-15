<ul class="navtab">
    @if (Auth::check())
        <li><a href="{{ URL::to('settings') }}"><span class="icon icon-settings"></span></a></li>
        <li><a href="{{ URL::to('logout') }}"><span class="icon icon-logout"></span></a></li>
    @else
        <li><a href="{{ URL::to('login') }}">{{ Lang::get('locale.login') }}</a></li>
        <li><a href="{{ URL::to('signup') }}">{{ Lang::get('locale.signup') }}</a></li>
    @endif
</ul>
