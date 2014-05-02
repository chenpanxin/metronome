<ul class="tab right">
    <li class="{{ HTML::isActive(Request::segment(2), 'profile') }}"><a href="{{ URL::to('settings/profile') }}">{{ Lang::get('locale.profile') }}</a></li>
    <li class="{{ HTML::isActive(Request::segment(2), 'password') }}"><a href="{{ URL::to('settings/password') }}">{{ Lang::get('locale.change_password') }}</a></li>
</ul>
