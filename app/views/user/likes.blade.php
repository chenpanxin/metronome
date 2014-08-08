@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-four">
                <li>{{ HTML::authTopics($user) }}</li>
                <li class="actived">{{ HTML::likes($user) }}</li>
                <li>{{ HTML::watching($user) }}</li>
                <li>{{ HTML::replies($user) }}</li>
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
    </div>
@stop

@section('width', 'w720')
