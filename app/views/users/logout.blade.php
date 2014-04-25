@extends('layouts.error')

@section('main')
    <div class="boxify">
        <a href="{{ URL::to('logout') }}">{{ Lang::get('locale.logout') }}</a>
        {{ Form::open(['url'=>URL::to('logout'), 'method'=>'delete']) }}
            {{ Form::submit(Lang::get('locale.logout'), ['id'=>'logout']) }}
        {{ Form::close() }}
    </div>
@stop
