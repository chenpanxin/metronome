@extends('layout.master')

@section('main')
    <div class="boxify">
        @include('partial.flash')
        <div class="user profile edit">
            {{ Form::open(['url'=>'settings/profile', 'method'=>'put']) }}
                {{ Form::label('nickname', Lang::get('locale.nickname')) }}
                {{ Form::text('nickname', $user->profile->nickname) }}
                {{ Form::label('school', Lang::get('locale.school')) }}
                {{ Form::text('school', $user->profile->school) }}
                {{ Form::label('location', Lang::get('locale.location')) }}
                {{ Form::text('location', $user->profile->location) }}
                {{ Form::label('contact_email', Lang::get('locale.contact_email')) }}
                {{ Form::text('contact_email', $user->profile->contact_email) }}
                {{ Form::label('website', Lang::get('locale.website')) }}
                {{ Form::text('website', $user->profile->website) }}
                {{ Form::label('biography', Lang::get('locale.biography')) }}
                <textarea name="biography">{{ $user->profile->biography }}</textarea>
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
            <div class="user-avatar">
                <div class="avatar s115">
                    @if (Str::contains($user->avatar_url, 'gravatar'))
                        {{ HTML::image(Str::gravatarUrl($user->email, 256)) }}
                    @else
                        {{ HTML::image(Str::avatarUrl($user->email)) }}
                    @endif
                </div>
                {{ Form::open(['url'=>URL::to('settings/avatar'), 'files'=>true]) }}
                    {{ Form::file('avatar', ['class'=>'auto']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
