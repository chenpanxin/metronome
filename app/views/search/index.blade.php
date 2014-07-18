@extends('layout.master')

@section('main')
    <div class="boxify">
        @include('partials.notify')
        <div class="search index">
        {{ Form::open(['url'=>'search']) }}
            {{ Form::text('keyword', null, ['placeholder'=>Lang::get('locale.search')]) }}
            {{ Form::submit(Lang::get('locale.search'), ['class'=>'btn normal']) }}
        {{ Form::close() }}
        </div>
    </div>
@stop
