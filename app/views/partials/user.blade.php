@if (Auth::check())
    <a href=""><span class="icon-user"></span></a>
@else
    <a href="{{ URL::to('login') }}">{{ Lang::get('locale.login') }}</a>
    <a href="{{ URL::to('signup') }}">{{ Lang::get('locale.signup') }}</a>
@endif
