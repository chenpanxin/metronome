@extends('layout.busker')

@section('main')

    <div class="boxify"></div>

@stop

@section('sidebar')

    <div class="boxify">
        <ul class="tab inverse">
            <li class="active">
                <a href="{{ URL::to('admin/user') }}">{{ Lang::get('locale.users') }}</a>
            </li>
            <li>
                <a href="{{ URL::to('admin/topic') }}">{{ Lang::get('locale.topic') }}</a>
            </li>
            <li>
                <a href="{{ URL::to('admin/category') }}">{{ Lang::get('locale.category') }}</a>
            </li>
        </ul>
    </div>

@stop
