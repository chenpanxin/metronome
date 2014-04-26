@extends('layouts.master')

@section('main')
    <div class="boxify">
        <div class="show topic">
            <div class="title">{{ $topic->title }}</div>
            <div class="body">{{ $topic->body }}</div>
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
                <li><a href="">0<span>{{ Lang::get('locale.topic') }}</span></a></li>
                <li><a href="">10<span>{{ Lang::get('locale.following') }}</span></a></li>
                <li><a href="">1<span>{{ Lang::get('locale.followers') }}</span></a></li>
            </ul>
        </div>
    </div>
@stop
