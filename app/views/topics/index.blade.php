@extends('layouts.master')

@section('main')
    <div class="boxify">
        <ul class="list topic">
            @foreach ($topics as $topic)
                <li>
                    <a class="title" href="{{ URL::to('topic/'.$topic->id) }}">{{ $topic->title }}<span class="icon-export pull_right"></span></a>
                    <div class="avatar"><a href="{{ URL::to('user/'.$topic->user->username) }}"><img src="{{ $topic->user->avatar_url }}"></a></div>
                    <p class="meta">
                        <a href="{{ URL::to('user/'.$topic->user->username) }}">{{ $topic->user->username }}</a>
                        <a href="{{ URL::to('category/'.$topic->category->id) }}">{{ $topic->category->name }}</a>
                        <span class="timeago" title="{{ $topic->created_at }}">{{ $topic->created_at->toFormattedDateString() }}</span>
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
        <div class="text-center">
            <a href="{{ URL::to('topic/new') }}" class="btn normal">{{ Lang::get('locale.create_topic') }}</a>
        </div>
    </div>
    <div class="boxify">
        <ul class="tab">
            @foreach ($categories as $category)
                {{ HTML::easyActived($category->id, Request::segment(2)) }}
                    <a href="{{ URL::to('category/'.$category->id) }}">
                        {{ $category->name }}
                        <span class="pull_right">
                            {{ $category->topics_count }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="boxify">
        @include('partials.stat')
        <a href="http://git.io">git.io</a>
        <a href="/redirect">redirect</a>
    </div>
@stop
