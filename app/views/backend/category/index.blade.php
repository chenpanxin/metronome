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
                <li><a href="{{ URL::to('admin/category/'.$category->id.'/edit') }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
@stop
