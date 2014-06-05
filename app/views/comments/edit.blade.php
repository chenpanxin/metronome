@extends('layouts.master')

@section('main')
    <div class="boxify">
        @include('partials.notify')
        <div class="edit topic">
            {{ Form::open(['url'=>'comment/'.$comment->id, 'method'=>'put']) }}
                {{ Form::label('content', Lang::get('locale.body')) }}
                {{ Form::textarea('content', $comment->content) }}
                {{ Form::hidden('topic_id', $comment->topic->id) }}
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify">
    </div>
@stop
