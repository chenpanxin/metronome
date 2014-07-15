@extends('layout.master')

@section('main')
    <div class="boxify">
        @include('partials.notify')
        {{ Form::open(['url'=>'settings/profile', 'method'=>'put']) }}
            <ul class="profile">
                {{ HTML::group([
                    Form::label('nickname', Lang::get('locale.nickname')),
                    Form::text('nickname', $user->profile->nickname)
                ]) }}
                {{ HTML::group([
                    Form::label('school', Lang::get('locale.school')),
                    Form::text('school', $user->profile->school)
                ]) }}
                {{ HTML::group([
                    Form::label('location', Lang::get('locale.location')),
                    Form::text('location', $user->profile->location)
                ]) }}
                {{ HTML::group([
                    Form::label('contact_email', Lang::get('locale.contact_email')),
                    Form::text('contact_email', $user->profile->contact_email)
                ]) }}
                {{ HTML::group([
                    Form::label('website', Lang::get('locale.website')),
                    Form::text('website', $user->profile->website)
                ]) }}
                {{ HTML::group([
                    Form::label('biography', Lang::get('locale.biography')),
                    Form::textarea('biography', $user->profile->biography, ['rows'=>4])
                ]) }}
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify">
        @include('partials.settings.tab')
    </div>
    @if (str_contains($user->avatar_url, 'uploads'))
        <div class="boxify">
            <div class="avatar-not-square">
                {{ HTML::image(str_replace('_s56', '', $user->avatar_url)) }}
            </div>
        </div>
    @endif
    <div class="boxify">
        <div class="upload-avatar">
            <div class="upload-form">
                <span class="icon-upload"></span>
                {{ Lang::get('locale.change_avatar') }}
                {{ Form::open(['url'=>URL::to('settings/avatar'), 'files'=>true]) }}
                    {{ Form::file('avatar', ['class'=>'auto']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
