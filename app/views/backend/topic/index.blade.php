@extends('layout.backend')

@section('main')
    <div class="boxify">
        <div class="tab">
            <ul class="tab tab-four">
                <li class="actived">{{ HTML::admin() }}</li>
                <li>{{ HTML::categories() }}</li>
                <li>{{ HTML::tags() }}</li>
                <li>{{ HTML::users() }}</li>
            </ul>
        </div>
        <div class="topic index">
            @foreach ($topics as $topic)
                <li><a href="{{ URL::to('admin/topic/'.$topic->id) }}">{{ $topic->title }}</a></li>
            @endforeach
        </div>
    </div>
@stop
