@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-five">
                <li class="actived">{{ HTML::user($user) }}</li>
                <li>{{ HTML::activity($user) }}</li>
                <li>{{ HTML::topic($user) }}</li>
                <li>{{ HTML::followers($user) }}</li>
                <li>{{ HTML::following($user) }}</li>
            </ul>
        </div>
        <div class="user show">



<!--             <div class="avatar-not-square">
                {{ HTML::image(str_replace('_s56', '', $user->avatar_url)) }}
            </div> -->
            <div class="user-account">
                <p><span>{{ Lang::get('locale.username') }}</span>{{ $user->username }}</p>
            </div>
            <div class="user-profile">
                <p><span>{{ Lang::get('locale.nickname') }}</span>{{ $user->profile->nickname }}</p>
                <p><span>{{ Lang::get('locale.location') }}</span>{{ $user->profile->location }}</p>
                <p><span>{{ Lang::get('locale.school') }}</span>{{ $user->profile->school }}</p>
                <p><span>{{ Lang::get('locale.website') }}</span>{{ $user->profile->website }}</p>
                @unless ($user->profile->contact_email == '')
                <p><span>{{ Lang::get('locale.contact_email') }}</span>{{ HTML::mailto($user->profile->contact_email) }}</p>
                @endunless
                <p><span>{{ Lang::get('locale.biography') }}</span>{{ $user->profile->biography }}</p>
                <p><span>{{ Lang::get('locale.signup_date') }}</span>{{ $user->created_at->toFormattedDateString() }} ( {{ Lang::get('locale.user_number', ['number'=>$user->id]) }} )</p>
            </div>
        </div>
    </div>
@stop
