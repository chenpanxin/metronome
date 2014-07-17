@extends('layout.master')

@section('main')
    <div class="boxify">
        @include('partials.notify')
        <div class="topic show">
            <div class="title"><span>{{ $reply->topic->title }}</span></div>
        </div>
        <div class="reply edit">
            {{ Form::open(['url'=>'reply/'.$reply->id, 'method'=>'put']) }}
                {{ Form::label('body', Lang::get('locale.body')) }}
                <textarea name="content">{{ $reply->content }}</textarea>
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
