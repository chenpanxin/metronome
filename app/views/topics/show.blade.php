@extends('layouts.master')

@section('main')
    <div class="boxify">
        <div class="show topic">
            <div class="title">{{{ $topic->title }}}</div>
            <div class="body">{{ $topic_html }}</div>
            <div class="topic-stats">
                {{ Lang::get('locale.post_on') }}
                <span class="post_on">{{ $topic->created_at }}</span>
                {{ Lang::get('locale.comments_count') }}
                <span>{{ $topic->comments_count }}</span>
                <span class="pull_right"><i class="icon-like"></i></span>
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
            <div class="vcard-user-info">
                <div class="avatar">{{ HTML::image($topic->user->avatar_url) }}</div>
                <div class="account">
                    <span>{{ $topic->user->username }}</span>
                    <span>{{ $topic->user->created_at }}</span>
                </div>
            </div>
            <ul class="vcard-stats">
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/topics') }}"><span class="number">100</span><span>{{ Lang::get('locale.topic') }}</span></a></li>
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/following') }}"><span class="number">100</span><span>{{ Lang::get('locale.following') }}</span></a></li>
                <li><a href="{{ URL::to('user/'.$topic->user->username.'/followers') }}"><span class="number">12</span><span>{{ Lang::get('locale.followers') }}</span></a></li>
            </ul>
        </div>
    </div>
@stop
