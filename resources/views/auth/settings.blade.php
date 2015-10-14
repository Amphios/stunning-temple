@extends('app')

@section('content')

    <h1>{{ $user->username }}, here are your account settings:</h1>

    <hr/>
	{{ Session::get('updateSuccessMessage') }}
    {!! Form::open(['url' => '/update/settings']) !!}

    	@include ('settings.form_account', ['submitButtonText' => 'Update Settings'])

    {!! Form::close() !!}

    @include ('errors.list')

    {{ Session::get('updatePasswordMessage') }}
    {!! Form::open(['url' => '/update/password']) !!}

    	@include ('settings.form_password', ['submitButtonText' => 'Update Password'])

    {!! Form::close() !!}

    {{ Session::get('uploadAvatarMessage') }}
    {!! Form::open(['url' => '/upload/avatar', 'files' => true]) !!}

        @include ('settings.form_avatar', ['submitButtonText' => 'Upload'])

    {!! Form::close() !!}

@stop



