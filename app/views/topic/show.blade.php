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
    <div class="boxify">
        <ul class="reply index">
            @foreach ($replies as $reply)
                <li class="r-{{ $reply->id }}">
                    <a href="{{ URL::to($reply->user->username) }}" class="avatar s42">{{ HTML::image($reply->user->avatar_url) }}</a>
                    <a href="{{ URL::to($reply->user->username) }}" class="username">{{ $reply->user->username }}</a>
                    <span class="date timeago" title="{{ $reply->created_at }}"></span>
                    @if (Auth::check() and Auth::user()->id == $reply->user->id)
                        <a href="{{ URL::to('reply/'.$reply->id) }}" class="delete" data-method="delete"><span class="icon-delete"></span></a>
                    @endif
                    <div class="content">{{ $reply->texts->first()->markup; }}</div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="boxify">
        <div class="reply new">
            {{ Form::open(['url'=>'topic/'.$topic->id]) }}
                <textarea name="content" placeholder="{{ Lang::get('locale.write_comment') }}"></textarea>
                {{ Form::submit(Lang::get('locale.comment'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('sidebar')
@stop
