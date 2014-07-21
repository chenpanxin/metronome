@extends('layout.master')

@section('main')
    <div class="boxify">
        @include('partial.flash')
        <div class="user password edit">
            {{ Form::open(['url'=>'settings/password', 'method'=>'patch']) }}
                {{ Form::label('current_password', Lang::get('locale.current_password')) }}
                {{ Form::password('current_password') }}
                {{ Form::label('password', Lang::get('locale.new_password')) }}
                {{ Form::password('password') }}
                {{ Form::label('password_confirmation', Lang::get('locale.confirm_password')) }}
                {{ Form::password('password_confirmation') }}
                {{ Form::submit(Lang::get('locale.save'), ['class'=>'btn normal']) }}
            {{ Form::close() }}
        </div>
    </div>
@stop
