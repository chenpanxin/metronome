@extends('layout.busker')


@section('main')
    <div class="boxify">
        @include('partials.notify')
        <div class="category new">
            {{ Form::open(['url'=>'ghost/category/store']) }}
                {{ Form::text('name', null, ['placeholder'=>Lang::get('locale.name')]) }}
                {{ Form::text('slug', null, ['placeholder'=>Lang::get('locale.slug')]) }}
                {{ Form::submit(Lang::get('locale.create_category'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify">

    </div>
@stop
