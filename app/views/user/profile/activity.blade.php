@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-five">
                <li>{{ HTML::user($user) }}</li>
                <li class="actived">{{ HTML::activity($user) }}</li>
                <li>{{ HTML::topics($user) }}</li>
                <li>{{ HTML::followers($user) }}</li>
                <li>{{ HTML::following($user) }}</li>
            </ul>
        </div>
        <div class="user activity">
            @foreach ($user->events as $activity)
                <p><a href="{{ URL::to($user->username) }}">{{ $user->username }}</a> {{ $activity->content }}<span class="date">{{ $activity->created_at }}</span></p>
            @endforeach
        </div>
    </div>
@stop

@section('width', 'w720')
