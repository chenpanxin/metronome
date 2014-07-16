@extends('layout.master')

@section('main')
    <div class="boxify">
        <div class="user destroy">
            <span>:(</span>
            <p>{{ Lang::get('locale.open_incorrect') }}</p>
        </div>
    </div>
@stop
