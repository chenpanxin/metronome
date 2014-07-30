@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-five">
                <li>{{ HTML::user($user) }}</li>
                <li>{{ HTML::activity($user) }}</li>
                <li>{{ HTML::topics($user) }}</li>
                <li class="actived">{{ HTML::followers($user) }}</li>
                <li>{{ HTML::following($user) }}</li>
            </ul>
        </div>
        <div class="followers">
            @foreach ($user->followers as $follower)
                <div class="user-item">
                    <div class="avatar">
                        <a href="{{ URL::to('user/'.$follower->username) }}">{{ HTML::image($follower->avatar_url) }}</a>
                    </div>
                    <div class="user-info">{{ $follower->username }}</div>
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('width', 'w720')
