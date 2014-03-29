@extends('layouts.master')

@section('main')
    <div class="boxify">
        <ul class="list topic">
            @foreach ($topics as $topic)
                <li>
                    <a class="title" href="{{ URL::to('topic/'.$topic->id) }}">{{ $topic->title }}<span class="icon-export pull_right"></span></a>
                    <span class="avatar"><img src="http://composer.qiniudn.com/me.jpg"></span>
                    <p class="meta">
                        <a href="">{{ Auth::user()->username }}</a>
                        {{ $topic->created_at->diffForHumans() }}
                    </p>
                </li>
            @endforeach
        </ul>
        <div class="pagination"></div>
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
    <div class="boxify"></div>
    <div class="boxify"></div>
    <div class="boxify"></div>
@stop
