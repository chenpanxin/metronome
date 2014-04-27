@extends('layouts.master')

@section('main')
    <div class="boxify">
        <ul class="list topic">
            @foreach ($user->topics as $topic)
                <li>
                    <a class="title" href="{{ URL::to('topic/'.$topic->id) }}">{{ $topic->title }}<span class="icon-export pull_right"></span></a>
                    <span class="avatar">{{ HTML::image($user->avatar_url) }}</span>
                    <p class="meta">
                        <a href="{{ URL::to('user/'.$user->username) }}">{{ $user->username }}</a>
                        {{ $topic->created_at->diffForHumans() }}
                    </p>
                </li>
            @endforeach
        </ul>
        <div class="pagination"></div>
    </div>
@stop

@section('sidebar')
    <div class="boxify">
        @include('partials.user.tab')
    </div>
@stop
