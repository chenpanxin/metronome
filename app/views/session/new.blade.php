@extends('layout.master')

@section('main')
    <div class="boxify">
        @include('partials.notify')
        <div class="session new">
            {{ Form::open(['url'=>'session/store']) }}
                {{ Form::label('account', Lang::get('locale.account')) }}
                {{ Form::text('account') }}
                {{ Form::label('password', Lang::get('locale.password')) }}
                {{ Form::password('password') }}
                <label class="rememberme">
                    {{ Form::checkbox('remember_me') }}
                    <span>{{ Lang::get('locale.remember_me') }}</span>
                </label>
                {{ Form::submit(Lang::get('locale.login'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
