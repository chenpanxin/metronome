@extends('layout.master')

@section('main')
    <div class="boxify">
        <ul class="list topic index">
            @foreach ($topics as $topic)
                <li>
                    <a href="{{ URL::to($topic->user->username) }}" class="avatar s42">{{ HTML::image($topic->user->avatar_url) }}</a>
                    <a href="{{ URL::to('topic/'.$topic->id) }}" class="title">{{ $topic->title }}<span class="date">{{ $topic->created_at->toFormattedDateString() }}</span></a>
                </li>
            @endforeach
        </ul>
        <div class="pagination">{{ $topics->links() }}</div>
    </div>
    <div class="boxify">
        <div class="category selection">
            @foreach ($categories as $category)
                <a href="{{ URL::to('category/'.$category->id) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
@stop

@section('sidebar')
@stop
