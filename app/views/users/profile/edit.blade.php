@extends('layouts.master')

@section('main')
    <div class="boxify">
        {{ Form::open(['url'=>'']) }}
            <ul class="profile">
                {{ HTML::group([
                    Form::label('nickname'),
                    Form::text('nickname')
                ]) }}
                {{ HTML::group([
                    Form::label('location'),
                    Form::text('location')
                ]) }}
                {{ HTML::group([
                    Form::label('company'),
                    Form::text('company')
                ]) }}
                {{ HTML::group([
                    Form::label('contact_email'),
                    Form::text('contact_email')
                ]) }}
                {{ HTML::group([
                    Form::label('biography'),
                    Form::textarea('biography', '', ['rows'=>4])
                ]) }}
            </ul>
        {{ Form::close() }}
    </div>
@stop

@section('sidebar')
    <div class="boxify"></div>
@stop
