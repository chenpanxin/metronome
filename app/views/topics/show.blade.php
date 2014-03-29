@extends('layouts.master')

@section('main')
    <div class="boxify">
        <div class="show topic">
            <div class="title">{{ $topic->title }}</div>
            <div class="body">{{ $topic->body }}</div>
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
@stop
