@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-three">
                <li><a href="{{ URL::to('me/topics') }}">{{ Lang::get('locale.me') }}</a></li>
                <li class="actived">{{ HTML::likes() }}</li>
                <li>{{ HTML::watching() }}</li>
            </ul>
        </div>
    </div>
@stop
