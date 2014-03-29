@extends('layouts.error')

@section('main')
    <div class="boxify">
        {{ Form::open(['url'=>URL::to('logout'), 'method'=>'delete']) }}
            {{ Form::submit(Lang::get('locale.logout'), ['id'=>'logout', 'class'=>'btn normal']) }}
        {{ Form::close() }}
    </div>
@stop
