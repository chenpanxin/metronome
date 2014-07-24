@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-five">
                <li class="actived">{{ HTML::user($user) }}</li>
                <li>{{ HTML::activity($user) }}</li>
                <li>{{ HTML::topics($user) }}</li>
                <li>{{ HTML::followers($user) }}</li>
                <li>{{ HTML::following($user) }}</li>
            </ul>
        </div>
        <div class="user profile show">
            <p>
                {{ Lang::get('locale.username') }}
                {{ $user->username }}
            </p>
            <p>
                {{ Lang::get('locale.nickname') }}
                {{ $user->profile->nickname }}
            </p>
            <p>
                {{ Lang::get('locale.location') }}
                {{ $user->profile->location }}
            </p>
            <p>
                {{ Lang::get('locale.school') }}
                {{ $user->profile->school }}
            </p>
            <p>
                {{ Lang::get('locale.website') }}
                {{ $user->profile->website }}
            </p>
            <p>
                {{ Lang::get('locale.contact_email') }}
                {{ HTML::mailto($user->profile->contact_email) }}
            </p>
            <p>
                {{ Lang::get('locale.biography') }}
                {{ $user->profile->biography }}
            </p>
            <p>
                {{ Lang::get('locale.signup_date') }}
                {{ $user->created_at->toFormattedDateString() }}
                {{ Lang::get('locale.user_number', ['number'=>$user->id]) }}
            </p>
        </div>
    </div>
@stop
