@extends('layout.backend')

@section('main')
    <div class="boxify">
        <div class="tab">
            <ul class="tab tab-four">
                <li>{{ HTML::admin() }}</li>
                <li>{{ HTML::categories() }}</li>
                <li>{{ HTML::tags() }}</li>
                <li class="actived">{{ HTML::users() }}</li>
            </ul>
        </div>
        <div class="user index">
            @foreach ($users as $user)
                <li><a href="{{ URL::to('admin/user/'.$user->id) }}">{{ $user->username }}</a></li>
            @endforeach
        </div>
    </div>
@stop
