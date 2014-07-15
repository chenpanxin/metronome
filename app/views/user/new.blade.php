@extends('layout.master')

@section('main')
    <div class="boxify">
        @include('partials.notify')
        {{ Form::open(['url'=>'user/store']) }}
            <ul class="signup">
                {{ HTML::group([
                    Form::label('username', Lang::get('locale.username')),
                    Form::text('username'),
                    $errors->first('username', '<span class="error">:message</span>')
                ]) }}
                {{ HTML::group([
                    Form::label('email', Lang::get('locale.email')),
                    Form::text('email'),
                    $errors->first('email', '<span class="error">:message</span>')
                ]) }}
                {{ HTML::group([
                    Form::label('password', Lang::get('locale.password')),
                    Form::password('password'),
                    $errors->first('password', '<span class="error">:message</span>')
                ]) }}
                {{ Form::submit(Lang::get('locale.signup'), ['class'=>'btn normal']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify">
        @include('partials.entries')
    </div>
@stop
