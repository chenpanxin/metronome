@extends('layouts.master')

@section('main')
    <div class="boxify">
        {{ Form::open(['url'=>'sessions/store']) }}
            <ul class="login">
                {{ HTML::group([
                    Form::label('account', Lang::get('locale.account')),
                    Form::text('account')
                ]) }}
                {{ HTML::group([
                    Form::label('password', Lang::get('locale.password')),
                    Form::password('password')
                ]) }}
                {{ HTML::label([
                    Form::checkbox('remember_me'),
                    Lang::get('locale.remember_me')
                ]) }}
                {{ Form::submit(Lang::get('locale.login'), ['class'=>'btn normal']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify">
        @include('partials.user_entries')
    </div>
@stop
