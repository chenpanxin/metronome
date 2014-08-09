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
        @include('partial.flash')
        <ul class="category index">
            @foreach ($categories as $category)
                <li>
                    <a href="{{ URL::to('admin/category/'.$category->id) }}" data-method="delete"><span class="icon-cross"></span></a>
                    <a href="{{ URL::to('admin/category/'.$category->id.'/edit') }}">{{ $category->name }}<span class="count">{{ $category->topics_count }}</span></a>
                </li>
            @endforeach
        </ul>
        <div class="category new">
            {{ Form::open(['url'=>'admin/category/store']) }}
                {{ Form::label('name', Lang::get('locale.name')) }}
                {{ Form::text('name') }}
                {{ Form::label('slug', Lang::get('locale.slug')) }}
                {{ Form::text('slug') }}
                {{ Form::submit(Lang::get('locale.create_category'), ['class'=>'btn primary']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('width', 'w720')
