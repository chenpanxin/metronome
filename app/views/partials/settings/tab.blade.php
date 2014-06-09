<ul class="tab">
    {{ HTML::easyTab('profile', URL::to('settings/profile'), Request::segment(2), Lang::get('locale.profile')) }}
    {{ HTML::easyTab('password', URL::to('settings/password'), Request::segment(2), Lang::get('locale.change_password')) }}
</ul>
