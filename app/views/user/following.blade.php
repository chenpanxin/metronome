@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-five">
                <li>{{ HTML::user($user) }}</li>
                <li>{{ HTML::activity($user) }}</li>
                <li>{{ HTML::topics($user) }}</li>
                <li>{{ HTML::followers($user) }}</li>
                <li class="actived">{{ HTML::following($user) }}</li>
            </ul>
        </div>
        <div class="following">
            @foreach ($user->following as $followed)
                <div class="user-item">
                    <div class="avatar">
                        <a href="{{ URL::to('user/'.$followed->username) }}">{{ HTML::image($followed->avatar_url) }}</a>
                    </div>
                    <div class="user-info">{{ $followed->username }}</div>
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
