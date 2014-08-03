@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="topic show">
            <a href="{{ URL::to($topic->user->username) }}" class="avatar s42">{{ HTML::image($topic->user->avatar_url) }}</a>
            <div class="title"><span>{{{ $topic->title }}}</span></div>
            <div class="body markdown">{{ $topic->body }}</div>
            <div class="topic-opt">
                @if ($liker_right)
                    <a href="{{ URL::to('topic/'.$topic->id.'/unlike') }}" data-method="delete" class="heart"><span class="icon-heart"></span></a>
                @else
                    <a href="{{ URL::to('topic/'.$topic->id.'/like') }}" data-method="post"><span class="icon-heart"></span></a>
                @endif
            </div>
        </div>
    </div>
    @if ($replies->count())
        @include('partial.reply')
    @endif
    <div class="boxify">
        <div class="reply new">
            {{ Form::open(['url'=>'topic/'.$topic->id]) }}
                <textarea name="content" placeholder="{{ Lang::get('locale.write_comment') }}"></textarea>
                {{ Form::submit(Lang::get('locale.comment'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('width', 'w720')
