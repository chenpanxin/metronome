@extends('layout.backend')

@section('main')
    <div class="boxify">
        <div class="category tab">
            <ul class="tab tab-four">
                <li>{{ HTML::admin() }}</li>
                <li class="actived">{{ HTML::categories() }}</li>
                <li>{{ HTML::tags() }}</li>
                <li>{{ HTML::users() }}</li>
            </ul>
        </div>
        <div class="category edit">
            {{ Form::open(['url'=>'admin/category/'.$category->id, 'method'=>'put']) }}
                {{ Form::text('name', $category->name) }}
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('width', 'w720')
