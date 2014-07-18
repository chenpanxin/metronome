@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-five">
                <li>{{ HTML::user($user) }}</li>
                <li>{{ HTML::activity($user) }}</li>
                <li class="actived">{{ HTML::topics($user) }}</li>
                <li>{{ HTML::followers($user) }}</li>
                <li>{{ HTML::following($user) }}</li>
            </ul>
        </div>
        <ul class="list topic">
            @foreach ($user->topics as $topic)
                <li>
                    <a class="title" href="{{ URL::to('topic/'.$topic->id) }}">{{ $topic->title }}<span class="icon-export pull_right"></span></a>
                    <a class="avatar">{{ HTML::image($user->avatar_url) }}</a>
                    <p class="meta">
                        <a href="{{ URL::to('user/'.$user->username) }}">{{ $user->username }}</a>
                        <span class="timeago" title="{{ $topic->created_at }}">{{ $topic->created_at->diffForHumans() }}</span>

                        @if (Auth::check() and Auth::user()->id == $user->id)
                        <a href="{{ URL::to('topic/'.$topic->id) }}" class="pull_right" data-method="delele">{{ Lang::get('locale.delete') }}</a>
                        <a href="{{ URL::to('topic/'.$topic->id.'/edit') }}" class="pull_right">{{ Lang::get('locale.edit') }}</a>
                        @endif
                    </p>
                </li>
            @endforeach
        </ul>
        <div class="pagination"></div>
    </div>
@stop
