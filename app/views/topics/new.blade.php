@extends('layouts.master')

@section('main')
    <div class="boxify">
        <div class="new topic">
            {{ Form::open(['url'=>'topic/store']) }}
                {{ Form::label('title', Lang::get('locale.title')) }}
                {{ Form::text('title') }}
                {{ Form::label('body', Lang::get('locale.body')) }}
                {{ Form::textarea('body', '', ['cols'=>28]) }}
                {{ Form::submit(Lang::get('locale.new_topic'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
@stop
