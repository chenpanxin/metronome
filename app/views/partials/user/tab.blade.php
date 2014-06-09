<ul class="tab">
    {{ HTML::easyTab('', URL::to('user/'.$user->username), Request::segment(3), Lang::get('locale.user_info')) }}
    {{ HTML::easyTab('topic', URL::to('user/'.$user->username.'/topic'), Request::segment(3), Lang::get('locale.user_topic')) }}
    {{ HTML::easyTab('following', URL::to('user/'.$user->username.'/following'), Request::segment(3)) }}
    {{ HTML::easyTab('followers', URL::to('user/'.$user->username.'/followers'), Request::segment(3)) }}
</ul>
