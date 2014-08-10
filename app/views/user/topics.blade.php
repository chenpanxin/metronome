@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-four">
                <li class="actived">{{ HTML::authTopics($user) }}</li>
                <li>{{ HTML::likes($user) }}</li>
                <li>{{ HTML::watching($user) }}</li>
                <li>{{ HTML::replies($user) }}</li>
            </ul>
        </div>
        <ul class="list topic index">
            @foreach ($user->topics as $topic)
                <li>
                    <a class="avatar s42">{{ HTML::image($user->avatar_url) }}</a>
                    <a class="title" href="{{ URL::to('topic/'.$topic->id) }}">{{ $topic->title }}<span class="date timeago" title="{{ $topic->created_at }}">{{ $topic->created_at->diffForHumans() }}</span></a>
                </li>
            @endforeach
        </ul>
    </div>
@stop

@section('width', 'w720')
