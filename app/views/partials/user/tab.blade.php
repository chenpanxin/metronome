<ul class="tab right">
    <li class="{{ HTML::isActive(Request::segment(3), '') }}"><a href="{{ URL::to('user/'.$user->username) }}">{{ Lang::get('locale.user_info') }}</a></li>
    <li class="{{ HTML::isActive(Request::segment(3), 'topics') }}"><a href="{{ URL::to('user/'.$user->username.'/topics') }}">{{ Lang::get('locale.user_topic') }}</a></li>
    <li class="{{ HTML::isActive(Request::segment(3), 'following') }}"><a href="{{ URL::to('user/'.$user->username.'/following') }}">{{ Lang::get('locale.following') }}</a></li>
    <li class="{{ HTML::isActive(Request::segment(3), 'followers') }}"><a href="{{ URL::to('user/'.$user->username.'/followers') }}">{{ Lang::get('locale.followers') }}</a></li>
</ul>
