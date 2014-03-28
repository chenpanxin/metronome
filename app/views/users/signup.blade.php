@extends('layouts.master')

@section('main')
    <div class="boxify">
        {{ Form::open() }}
            <ul class="signup">
                {{ Form::userText('username', 'Username Field', ['label'=>'Name']) }}
                {{ Form::userPassword('password', ['label'=>'Password']) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
@stop
