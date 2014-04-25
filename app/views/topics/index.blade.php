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
        <div class="sort">
            <ul class="sort-tab">
                <li><a href="{{ URL::to('popular') }}"><i class="icon-list"></i><span>{{ Lang::get('locale.popular') }}</span></a></li>
                <li><a href="{{ URL::to('newest') }}"><i class="icon-newest"></i><span>{{ Lang::get('locale.newest') }}</span></a></li>
                <li><a href="{{ URL::to('no_discuss') }}"><i class="icon-bulb"></i><span>{{ Lang::get('locale.no_discuss') }}</span></a></li>
            </ul>
        </div>
    </div>
    <div class="boxify">
        <ul class="tab right">
            @foreach ($categories as $category)
                <li class="{{ HTML::isActive(Request::segment(2), $category->id) }}"><a href="{{ URL::to('category/'.$category->id) }}">{{ $category->name }}<span class="pull_right">{{ $category->topics_count }}</span></a></li>
            @endforeach
        </ul>
    </div>
    <div class="boxify">
        @include('partials.stat')
    </div>
@stop
