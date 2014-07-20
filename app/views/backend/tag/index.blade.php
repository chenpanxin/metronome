@extends('layout.backend')

@section('main')
    <div class="boxify">
        <div class="tab tag">
            <ul class="tab tab-four">
                <li>{{ HTML::admin() }}</li>
                <li>{{ HTML::categories() }}</li>
                <li class="actived">{{ HTML::tags() }}</li>
                <li>{{ HTML::users() }}</li>
            </ul>
        </div>
        <div class="tag index">

        </div>
    </div>
@stop
