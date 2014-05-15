@extends('layouts.master')

@section('main')
    <div class="boxify">
        {{ Form::open(['url'=>'password/remind']) }}
            <ul class="find">
                {{ HTML::group([
                    Form::label('email', Lang::get('locale.email')),
                    Form::text('email'),
                    $errors->first('email', '<span class="error">:message</span>')
                ]) }}
                {{ Form::submit(Lang::get('locale.reset_password'), ['class'=>'btn normal']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify">
        @include('partials.entries')
    </div>
@stop
