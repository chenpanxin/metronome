@extends('layout.backend')

@section('main')
    <div class="boxify">
        <div class="tab user">
            <ul class="tab tab-four">
                <li>{{ HTML::admin() }}</li>
                <li>{{ HTML::categories() }}</li>
                <li>{{ HTML::tags() }}</li>
                <li class="actived">{{ HTML::users() }}</li>
            </ul>
        </div>
        <div class="user edit">
        {{ var_dump($user->profile->toArray()) }}
        </div>
    </div>
@stop
