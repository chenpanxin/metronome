@extends('layouts.master')

@section('main')
    <div class="boxify">
        {{ Form::open(['url'=>'settings/profile', 'method'=>'put']) }}
            <ul class="profile">
                {{ HTML::group([
                    Form::label('nickname', Lang::get('locale.nickname')),
                    Form::text('nickname', $profile->nickname)
                ]) }}
                {{ HTML::group([
                    Form::label('location', Lang::get('locale.location')),
                    Form::text('location', $profile->location)
                ]) }}
                {{ HTML::group([
                    Form::label('school', Lang::get('locale.school')),
                    Form::text('school', $profile->school)
                ]) }}
                {{ HTML::group([
                    Form::label('contact_email', Lang::get('locale.contact_email')),
                    Form::text('contact_email', $profile->contact_email)
                ]) }}
                {{ HTML::group([
                    Form::label('biography', Lang::get('locale.biography')),
                    Form::textarea('biography', $profile->biography, ['rows'=>4])
                ]) }}
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
@stop
