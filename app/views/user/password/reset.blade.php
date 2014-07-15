@extends('layouts.master')

@section('main')
    <div class="boxify">
        @if (Session::has('error'))
            <div class="alert notify">
                <p>{{ Session::get('error') }}</p>
            </div>
        @endif
        {{ Form::open(['url'=>'password/reset', 'method'=>'post']) }}
            <ul class="password">
                {{ HTML::group([
                    Form::label('email', Lang::get('locale.email')),
                    Form::text('email')
                ]) }}
                {{ HTML::group([
                    Form::label('password', Lang::get('locale.new_password')),
                    Form::password('password')
                ]) }}
                {{ HTML::group([
                    Form::label('password_confirmation', Lang::get('locale.confirm_password')),
                    Form::password('password_confirmation')
                ]) }}
                {{ Form::hidden('token', $token) }}
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify">

    </div>
@stop
