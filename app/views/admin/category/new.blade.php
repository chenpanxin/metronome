@extends('layouts.master')


@section('main')
    <div class="boxify">
        <div class="new">
            {{ Form::open(['url'=>'admin/category/store']) }}
                {{ Form::text('name') }}
                {{ Form::submit(Lang::get('locate.create'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
