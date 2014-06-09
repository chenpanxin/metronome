<ul class="tab right">
    {{ HTML::easyTab('login', URL::to('login'), Request::segment(1), Lang::get('locale.login')) }}
    {{ HTML::easyTab('signup', URL::to('signup'), Request::segment(1), Lang::get('locale.signup')) }}
    {{ HTML::easyTab('forgot_password', URL::to('session/forgot_password'), Request::segment(2), Lang::get('locale.reset_password')) }}
</ul>
