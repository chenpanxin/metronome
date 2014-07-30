@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user index">
            @foreach ($users as $user)
            @endforeach
        </div>
    </div>
@stop

@section('width', 'w720')
