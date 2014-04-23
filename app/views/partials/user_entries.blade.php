<ul class="tab right">
    <li class="{{ HTML::isActive(Request::segment(1), 'login') }}"><a href="{{ URL::to('login') }}">{{ Lang::get('locale.login') }}</a></li>
    <li class="{{ HTML::isActive(Request::segment(1), 'signup') }}"><a href="{{ URL::to('signup') }}">{{ Lang::get('locale.signup') }}</a></li>
    <li class="{{ HTML::isActive(Request::segment(2), 'forgot_password') }}"><a href="{{ URL::to('session/forgot_password') }}">{{ Lang::get('locale.reset_password') }}</a></li>
</ul>
