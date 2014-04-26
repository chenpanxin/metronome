@extends('layouts.master')

@section('main')
    <div class="boxify">
        <div class="following">
            @foreach ($user->following as $followed)
                <div class="user-item">
                    <div class="avatar">
                        <a href="{{ URL::to('user/'.$followed->username) }}">{{ HTML::image(Str::avatar_url($followed->avatar_url)) }}</a>
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
