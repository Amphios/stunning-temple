@extends('app')

@section('content')

    <h1>Profile</h1>

    <p>
	    {{ $user->username }}
        &nbsp; | &nbsp;
	    Gems: {{ $user->gems }}
	    &nbsp; | &nbsp;
	    £{{ number_format($user->money, 2) }}
        &nbsp; | &nbsp;
        Stars: {{$user->stars }}
    </p>

    <p>
		{!! Form::open(['url' => 'convertGems']) !!}

			<div class="form-group">
				{!! Form::label('gemsAmount', 'Amount of Gems to convert:') !!}
				{!! Form::text('gemsAmount', null, ['class' => 'form-control']) !!}
				<input type="hidden" value="{{ $user->id }}" name="id" id="id">
			</div>

			<div class="form-group">
				{!! Form::submit('Convert', ['class' => 'btn btn-primary form-control']) !!}
			</div>

	    {!! Form::close() !!}
    </p>

    @include ('errors.list')
    {{ Session::get('convertSuccessMessage') }}

@stop
