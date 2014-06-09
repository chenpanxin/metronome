@extends('layout.busker')


@section('main')
    <div class="boxify">
        @include('partials.notify')
        <div class="category edit">
            {{ Form::open(['url'=>'ghost/category/'.$category->id, 'method'=>'put']) }}
                {{ Form::text('name', $category->name) }}
                {{ Form::text('slug', $category->slug) }}
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('sidebar')
    <div class="boxify">

    </div>
@stop
