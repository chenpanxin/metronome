@extends('layouts.master')

@section('main')
    <div class="boxify">
        {{ Form::open(['url'=>'']) }}
            <ul class="">
                {{ HTML::group([
                    Form::label('nickname'),
                    Form::text('nickname')
                ]) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
@stop
