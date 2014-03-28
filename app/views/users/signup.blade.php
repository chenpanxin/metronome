@extends('layouts.master')

@section('main')
    <div class="boxify">
        {{ Form::open(['url'=>'users/store']) }}
            <ul class="signup">
                {{ Form::userText('username', Input::old('username'), ['label'=>Lang::get('locale.username')]) }}
                {{ Form::userText('email', Input::old('email'), ['label'=>Lang::get('locale.email')]) }}
                {{ Form::userPassword('password', ['label'=>Lang::get('locale.password')]) }}
                {{ Form::submit(Lang::get('locale.signup'), ['class'=>'btn normal']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
@stop
