@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="topic show">
            <a href="{{ URL::to($topic->user->username) }}" class="avatar s42">{{ HTML::image($topic->user->avatar_url) }}</a>
            <div class="title"><span>{{{ $topic->title }}}</span></div>
            <div class="body">{{ $topic->body }}</div>
            <div class="topic-opt">
                @if ($liking)
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
                    <a href="{{ URL::to('user/'.$reply->user->username) }}" class="avatar s56">{{ HTML::image('assets/avatar.jpg') }}</a>
                    <a href="{{ URL::to('user/'.$reply->user->username) }}" class="username">{{ $reply->user->username }}</a>
                    <span class="date">{{ $reply->created_at }}</span>
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
    <div class="boxify">
        <div class="vcard">
            <ul class="vcard-stats">
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/topic') }}"><span class="number">{{ $topics_count }}</span><span>{{ Lang::get('locale.topic') }}</span></a></li>
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/following') }}"><span class="number">{{ $following_count }}</span><span>{{ Lang::get('locale.following') }}</span></a></li>
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/followers') }}"><span class="number">{{ $followers_count }}</span><span>{{ Lang::get('locale.followers') }}</span></a></li>
            </ul>
        </div>
    </div>
@stop
