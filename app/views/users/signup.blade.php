@extends('layouts.master')

@section('main')
    <div class="boxify">
        {{ Form::open(['url'=>'user/store']) }}
            <ul class="signup">
                {{ HTML::group([
                    Form::label('username', Lang::get('locale.username')),
                    Form::text('username')
                ]) }}
                {{ HTML::group([
                    Form::label('email', Lang::get('locale.email')),
                    Form::text('email')
                ]) }}
                {{ HTML::group([
                    Form::label('password', Lang::get('locale.password')),
                    Form::password('password')
                ]) }}
                {{ Form::submit(Lang::get('locale.signup'), ['class'=>'btn normal']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
@stop
