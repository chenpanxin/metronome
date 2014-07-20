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
        </div>
    </div>
@stop

@section('sidebar')
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
