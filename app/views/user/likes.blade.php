@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user tab">
            <ul class="tab tab-four">
                <li>{{ HTML::authTopics($user) }}</li>
                <li class="actived">{{ HTML::likes($user) }}</li>
                <li>{{ HTML::watching($user) }}</li>
                <li>{{ HTML::replies($user) }}</li>
            </ul>
        </div>
    </div>
@stop

@section('width', 'w720')
