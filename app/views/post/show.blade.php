@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="topic show">
            <a href="{{ URL::to($post->user->username) }}" class="avatar s42">{{ HTML::image($post->user->avatar_url) }}</a>
            <div class="title"><span>{{{ $post->title }}}</span></div>
            <div class="body markdown">{{ $post->body }}</div>
            <div class="topic-opt">
            </div>
        </div>
    </div>
@stop
