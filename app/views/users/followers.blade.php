@extends('layouts.master')

@section('main')
    <div class="boxify">
        <div class="followers">
            @foreach ($user->followers as $follower)
                <div class="user-item">
                    <div class="avatar">
                        <a href="{{ URL::to('user/'.$follower->username) }}">{{ HTML::image(Str::avatar_url($follower->avatar_url)) }}</a>
                    </div>
                    <div class="user-info">{{ $follower->username }}</div>
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify">
        @include('partials.user.tab')
    </div>
@stop
