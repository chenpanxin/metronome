@extends('layout.backend')

@section('main')
    <div class="boxify">
        <div class="topic tab">
            <ul class="tab tab-four">
                <li class="actived">{{ HTML::admin() }}</li>
                <li>{{ HTML::categories() }}</li>
                <li>{{ HTML::tags() }}</li>
                <li>{{ HTML::users() }}</li>
            </ul>
        </div>
        <div class="topic index admin">
            @foreach ($topics as $topic)
                <li>
                    <a href="{{ URL::to('admin/topic/'.$topic->id) }}" data-method="delete"><span class="icon-cross"></span></a>
                    <a href="{{ URL::to('admin/topic/'.$topic->id.'/edit') }}" data-user="{{ $topic->user->username }}" class="title">{{ $topic->title }}<span class="date">{{ $topic->created_at->diffForHumans() }}</span></a>
                </li>
            @endforeach
        </div>
    </div>
@stop
