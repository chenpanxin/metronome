<ul>
    @if (Auth::check())
        <li><a href="{{ URL::to('notification') }}"><span class="icon-mail"></span></a></li>
        <li>
            <a href="/#" class="user-opt">{{ HTML::image('assets/avatar.jpg') }}<b>{{ Auth::user()->username }}</b></a>
            <ul class="dropdown">
                <li><a href=""><span class="icon-user"></span>{{ Lang::get('locale.home') }}</a></li>
                <li><a href=""><span class="icon-layout"></span>{{ Lang::get('locale.settings') }}</a></li>
                <li><a href=""><span class="icon-clock"></span>{{ Lang::get('locale.timeline') }}</a></li>
                <li><a href=""><span class="icon-esc"></span>{{ Lang::get('locale.logout') }}</a></li>
            </ul>
        </li>
    @else
        <li><a href="{{ URL::to('login') }}">{{ Lang::get('locale.login') }}</a></li>
        <li><a href="{{ URL::to('signup') }}">{{ Lang::get('locale.signup') }}</a></li>
    @endif
</ul>
