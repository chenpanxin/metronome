<ul class="navtab">
    @if (Auth::check())
        <li><a href="{{ URL::to('topic/new') }}"><span class="icon-plus"></span></a></li>
        <li><a href="{{ URL::to('search') }}"><span class="icon-search"></span></a></li>
        <li><a href="{{ URL::to('notification') }}"><span class="icon-inbox"></span></a></li>
        <li>
            <a href="/#" class="user-opt">{{ HTML::image('assets/avatar.jpg') }}<b>{{ Auth::user()->username }}</b></a>
            <ul class="dropdown">
                <li><a href="{{ URL::to('user/'.Auth::user()->username) }}"><span class="icon-user"></span>{{ Lang::get('locale.home') }}</a></li>
                <li><a href="{{ URL::to('settings') }}"><span class="icon-layout"></span>{{ Lang::get('locale.settings') }}</a></li>
                <li><a href="{{ URL::to('timeline') }}"><span class="icon-clock"></span>{{ Lang::get('locale.timeline') }}</a></li>
                <li><a href="{{ URL::to('logout') }}" data-method="delete"><span class="icon-esc"></span>{{ Lang::get('locale.logout') }}</a></li>
            </ul>
        </li>
    @else
        <li><a href="{{ URL::to('search') }}">{{ Lang::get('locale.search') }}</a></li>
        <li><a href="{{ URL::to('newest') }}">{{ Lang::get('locale.newest') }}</a></li>
        <li><a href="{{ URL::to('category') }}">{{ Lang::get('locale.category') }}</a></li>
        <li><a href="{{ URL::to('signup') }}">{{ Lang::get('locale.signup') }}</a></li>
        <li><a href="{{ URL::to('login') }}">{{ Lang::get('locale.login') }}</a></li>
    @endif
</ul>
