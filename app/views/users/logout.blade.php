@extends('layouts.error')

@section('main')
    <div class="boxify">
        <p class="not smile">:(</p>
        <p class="page error">{{ Lang::get('locale.open_incorrect') }}</p>
    </div>
@stop
