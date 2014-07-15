@extends('layout.master')

@section('main')
    <div class="boxify">
        <ul class="list topic index">
            @foreach ($topics as $topic)


<li>
    <a href="{{ URL::to('user/'.$topic->user->username) }}" class="avatar s56">{{ HTML::image('/assets/avatar.jpg') }}</a>
    <a href="{{ URL::to('topic/'.$topic->id) }}" class="title">{{ $topic->title }}</a>
    <a href="{{ URL::to('user/'.$topic->user->username) }}" class="meta">{{ $topic->user->username }}</a>
    <a href="{{ URL::to('category/'.$topic->category->id) }}" class="meta">{{ $topic->category->name }}</a>
    <a href="" class="date" data-time="{{ $topic->created_at }}">{{ $topic->created_at->toFormattedDateString() }}</a>
</li>
            @endforeach

<li class="end">

</li>

        </ul>
<!--         <div class="pagination">
            {{ $topics->links() }}
        </div> -->
    </div>
@stop

@section('sidebar')
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
