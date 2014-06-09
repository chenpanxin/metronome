@extends('layout.busker')

@section('main')
    <div class="boxify">
        <ul class="topic index">
            @foreach ($topics as $topic)
                <li>
                    <a href="{{ URL::to('admin/topic/'.$topic->id) }}" class="title">{{ $topic->title }}</a>
        <!-- <a href="{{ URL::to('admin/topic/'.$topic->id) }}" data-method="delete">{{ Lang::get('locale.delete') }}</a> -->
                </li>
            @endforeach
        </ul>
    </div>
@stop

@section('sidebar')

    <div class="boxify">
        @include('busker.partial.tab')
    </div>

@stop
