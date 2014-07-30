@extends('layout.master')

@section('main')
    <div class="boxify">
        @include('partial.flash')
        <div class="user new">
        {{ Form::open(['url'=>'user/store']) }}
            {{ Form::label('username', Lang::get('locale.username')) }}
            {{ Form::text('username'), $errors->first('username', '<span class="error">:message</span>') }}
            {{ Form::label('email', Lang::get('locale.email')) }}
            {{ Form::text('email'), $errors->first('email', '<span class="error">:message</span>') }}
            {{ Form::label('password', Lang::get('locale.password')) }}
            {{ Form::password('password'), $errors->first('password', '<span class="error">:message</span>') }}
            {{ Form::submit(Lang::get('locale.signup'), ['class'=>'btn normal']) }}
        {{ Form::close() }}
        </div>
    </div>
@stop

@section('width', 'w420')
