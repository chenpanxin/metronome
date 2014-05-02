@extends('layouts.master')

@section('main')
    <div class="boxify">
        @include('partials.notify')
        <div class="edit topic">
            {{ Form::open(['url'=>'topic/'.$topic->id, 'method'=>'put']) }}
                {{ Form::label('title', Lang::get('locale.title')) }}
                {{ Form::text('title', $topic->title) }}
                {{ Form::label('body', Lang::get('locale.body')) }}
                {{ Form::textarea('body', $topic->body, ['cols'=>28]) }}
                {{ Form::hidden('category_id', $topic->category->id) }}
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify">
    </div>
@stop
