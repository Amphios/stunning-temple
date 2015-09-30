@extends('app')

@section('content')

    <h1>{{ $user->username }}, here are your account settings:</h1>

    <hr/>

    {!! Form::model($settings, ['method' => 'PATCH', 'action' => ['SettingsController@update', Auth::user()->id]])!!}

    @include ('settings.form', ['submitButtonText' => 'Update Settings'])

    {!! Form::close() !!}

    @include ('errors.list')

@stop