<ul>
    @if (Auth::check())
        <li><a href="{{ URL::to('notification') }}"><span class="icon-mail"></span></a></li>
        <li><a href="/#" class="user-opt">{{ HTML::image('assets/avatar.jpg') }}</a></li>
    @else
        <li><a href="{{ URL::to('login') }}">{{ Lang::get('locale.login') }}</a></li>
        <li><a href="{{ URL::to('signup') }}">{{ Lang::get('locale.signup') }}</a></li>
    @endif
</ul>
