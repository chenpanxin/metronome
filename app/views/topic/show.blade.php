@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="topic show">
            <div class="title"><span>{{{ $topic->title }}}</span></div>
            <div class="body">{{ $topic->body }}</div>
<!--             <div class="topic-stats">
                <span>{{ Lang::get('locale.created_on') }}</span>
                <span class="timeago" title="{{ $topic->created_at }}">{{ $topic->created_at->toDateString() }}</span>
                <span>{{ $likers_count }}</span>
                <span>{{ Lang::get('locale.liking') }}</span>
                <span class="pull_right"><a href="{{ URL::to('topic/'.$topic->id.'/'.($liking ? 'unlike' : 'like')) }}" class="me like {{ $liking ? 'liking' : 'nil' }}"><i class="icon-like"></i></a></span>
            </div> -->
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
