@extends('layouts.master')

@section('main')
    <div class="boxify">
        <div class="show topic" hidden-category="{{ $topic->category->name }}">
            <div class="title">{{{ $topic->title }}}</div>
            <div class="body">{{ $topic_html }}</div>
            <div class="topic-stats">
                <span>{{ Lang::get('locale.created_on') }}</span>
                <span>{{ $topic->created_at->toDateString() }}</span>
                <span class="space"></span>
                <span>{{ Lang::get('locale.comments_count') }}</span>
                <span>{{ $topic->comments_count }}</span>
                <span class="pull_right"><a href="{{ URL::to('topic/'.$topic->id) }}" class="trigger comment">{{ Lang::get('locale.comment_it') }}</a></span>
            </div>
        </div>
    </div>
    <div class="boxify">
        @include('partials.comments')
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
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/topics') }}"><span class="number">100</span><span>{{ Lang::get('locale.topic') }}</span></a></li>
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/following') }}"><span class="number">100</span><span>{{ Lang::get('locale.following') }}</span></a></li>
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/followers') }}"><span class="number">12</span><span>{{ Lang::get('locale.followers') }}</span></a></li>
            </ul>
        </div>
    </div>
    <div class="comment-panel">
        <div class="back-cancel"></div>
        <div class="boxify panel">
            <div class="comment-area">
                {{ Form::open(['url'=>'topic/'.$topic->id]) }}
                    {{ Form::textarea('content') }}
                    {{ Form::submit(Lang::get('locale.comment'), ['class'=>'btn normal']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
