@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-three">
                <li><a href="{{ URL::to('me/topics') }}">{{ Lang::get('locale.me') }}</a></li>
                <li>{{ HTML::likes($user) }}</li>
                <li class="actived">{{ HTML::watching($user) }}</li>
            </ul>
        </div>
    </div>
@stop
