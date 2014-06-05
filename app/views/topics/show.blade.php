@extends('layouts.master')

@section('main')
    <div class="boxify">
        <div class="show topic" hidden-category="{{ $topic->category->name }}">
            <div class="title">{{{ $topic->title }}}</div>
            <div class="body">{{ $topic->body }}</div>
            <div class="topic-stats">
                <span>{{ Lang::get('locale.created_on') }}</span>
                <span class="timeago" title="{{ $topic->created_at }}">{{ $topic->created_at->toDateString() }}</span>
                <span>{{ $likers_count }}</span>
                <span>{{ Lang::get('locale.liking') }}</span>
                <span class="pull_right"><a href="{{ URL::to('topic/'.$topic->id.'/'.($liking ? 'unlike' : 'like')) }}" class="me like {{ $liking ? 'liking' : 'nil' }}"><i class="icon-like"></i></a></span>
            </div>
        </div>
    </div>
    @unless ($comments->count() == 0)
        <div class="boxify" data-comments-count="{{ $comments->count() }}">
            @include('partials.comments')
            <div class="hidden comment-edit-template">
                {{ Form::open(['url'=>'']) }}
                {{ Form::close() }}
            </div>
        </div>
    @endif
    <div class="boxify">
        <div class="new comment">
            {{ Form::open(['url'=>'topic/'.$topic->id]) }}
                {{ Form::textarea('content', null, ['placeholder'=>Lang::get('locale.write_comment')]) }}
                {{ Form::submit(Lang::get('locale.comment'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify">
        <div class="vcard">
            <div class="vcard-user-info clearfix">
                <div class="avatar">{{ HTML::image($topic->user->avatar_url) }}</div>
                <div class="account">
                    <span>{{ $topic->user->username }}</span>
                    @if (Auth::check() and $topic->user->id == Auth::user()->id)
                        <span><a href="{{ URL::to('settings') }}" class="linklr">{{ Lang::get('locale.edit_profile') }}</a></span>
                    @elseif (0)
                        <span><a href="{{ URL::to('unfollow?target='.$topic->user->username) }}" class="linklr relationship">{{ Lang::get('locale.unfollow') }}</a></span>
                    @else
                        <span><a href="{{ URL::to('follow?target='.$topic->user->username) }}" class="linklr relationship">{{ Lang::get('locale.follow') }}</a></span>
                    @endif
                    <span>{{ join(' ', [$topic->user->created_at->toFormattedDateString(), Lang::get('locale.join_on')]) }}</span>
                </div>
            </div>
            <ul class="vcard-stats">
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/topics') }}"><span class="number">{{ $topics_count }}</span><span>{{ Lang::get('locale.topic') }}</span></a></li>
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/following') }}"><span class="number">{{ $following_count }}</span><span>{{ Lang::get('locale.following') }}</span></a></li>
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/followers') }}"><span class="number">{{ $followers_count }}</span><span>{{ Lang::get('locale.followers') }}</span></a></li>
            </ul>
        </div>
    </div>
@stop
