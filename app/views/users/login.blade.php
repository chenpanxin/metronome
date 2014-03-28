@extends('layouts.master')

@section('main')
    <div class="boxify">
        {{ Form::open(['url'=>'sessions/store']) }}
            <ul class="login">
                {{ Form::userText('username', Input::old('username'), ['label'=>Lang::get('locale.account')]) }}
                {{ Form::userPassword('password', ['label'=>Lang::get('locale.password')]) }}
                <label>{{ Form::checkbox('remember_me') }} {{ Lang::get('locale.remember_me') }}</label>
                {{ Form::submit(Lang::get('locale.login'), ['class'=>'btn normal']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
@stop
