@extends('layouts.master')

@section('main')
    <div class="boxify">
        <div class="users">
            @foreach ($users as $user)
                <div class="user-item">
                    <div class="avatar">
                        <a href="{{ URL::to('user/'.$user->username) }}">{{ HTML::image($user->avatar_url) }}</a>
                    </div>
                    <div class="user-info">{{ $user->username }}</div>
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify">

    </div>
@stop
