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
        <ul class="category index">
            @foreach ($categories as $category)
                <li>
                    <a href="{{ URL::to('admin/category/'.$category->id) }}" data-method="delete"><span class="icon-cross"></span></a>
                    <a href="{{ URL::to('admin/category/'.$category->id.'/edit') }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
        <div class="category new">
            {{ Form::open(['url'=>'admin/category/store']) }}
                {{ Form::text('name', $category->name) }}
                {{ Form::submit(Lang::get('locale.create_category'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
