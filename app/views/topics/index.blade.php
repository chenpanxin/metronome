@extends('layouts.master')

@section('main')
    <div class="boxify">
        <ul class="list topic">
            @foreach ($topics as $topic)
                <li>
                    <a class="title" href="{{ URL::to('topic/'.$topic->id) }}">{{ $topic->title }}<span class="icon-export pull_right"></span></a>
                    <span class="avatar"><img src="http://composer.qiniudn.com/me.jpg"></span>
                    <p class="meta">
                        <a href="{{ URL::to('user/'.$topic->user->username) }}">{{ $topic->user->username }}</a>
                        {{ $topic->created_at->diffForHumans() }}
                    </p>
                </li>
            @endforeach
        </ul>
        <div class="pagination">
            {{ $topics->links() }}
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify">
        <ul class="tab right">
            @foreach ($categories as $category)
                <li class="{{ HTML::isActive(Request::segment(2), $category->id) }}"><a href="{{ URL::to('category/'.$category->id) }}">{{ $category->name }}<span class="pull_right">10</span></a></li>
            @endforeach
        </ul>
    </div>
    <div class="boxify"></div>
    <div class="boxify"></div>
    <div class="boxify"></div>
@stop
