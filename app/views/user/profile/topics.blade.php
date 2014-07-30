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
        <ul class="list topic index">
            @foreach ($user->topics as $topic)
                <li>
                    <a class="avatar s56">{{ HTML::image('assets/avatar.jpg') }}</a>
                    <a class="title" href="{{ URL::to('topic/'.$topic->id) }}">{{ $topic->title }}<span class="date">{{ $topic->created_at->diffForHumans() }}</span></a>
                </li>
            @endforeach
        </ul>
        <div class="pagination"></div>
    </div>
@stop

@section('width', 'w720')
