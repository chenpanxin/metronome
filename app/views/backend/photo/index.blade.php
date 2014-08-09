@extends('layout.backend')

@section('main')
    <div class="boxify">
        <ul class="photo index">
            @foreach ($photos as $photo)
                <li>
                    <a href="{{ URL::to('admin/photo/'.$photo->id) }}">{{ HTML::image('uploads/'.$photo->hash.'.jpg') }}</a>
                    <a href="{{ URL::to('admin/photo/'.$photo->id) }}" class="" data-method="delete"><span class="icon-cross"></span></a>
                </li>
            @endforeach
        </ul>
        <div class="photo new">
            {{ Form::open(['url'=>URL::to('admin/photo/store'), 'method'=>'post', 'files'=>true]) }}
                {{ Form::file('photo', ['class'=>'auto']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('width', 'w720')
